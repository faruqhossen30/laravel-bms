<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;
use App\Models\Transaction;
use App\Models\Alart;
use App\Models\Basic;

class OptionController extends Controller
{  

    protected $bs;
    public function __construct()
    {   $this->bs = Basic::findOrFail(1);
        $this->middleware('auth');
        $this->middleware('permission:Option');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'name' => 'required',
            'question_id' => 'required',
            'match_id' => 'required',
            'bet_rate' => 'required',
        ]);

        $input = $request->all();
        $option = Option::create($input);
        return response()->json($option);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $option = Option::findOrFail($id);
        $question = $option->question;
        return response()->json($option);
        return response()->json($question);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  
        $input = $request->all();
        $option = Option::find($id);
        $option->fill($input)->save();
        return response()->json($option);
    }

    // Option Run

    public function optionRun(Request $request, $id)
    {  
        $option = Option::find($id);
        $option->update(['status' => 'active']);
        return response()->json($option);
    }

    // Option Stop

    public function optionStop(Request $request, $id)
    {  
        $option = Option::find($id);
        $option->update(['status' => 'deactive']);
        return response()->json($option);
    }

     // Option Run

     public function optionShow(Request $request, $id)
     {  
         $option = Option::find($id);
         $option->update(['is_hide' => '0']);
         return response()->json($option);
     }
 
     // Option Stop
 
     public function optionHide(Request $request, $id)
     {  
         $option = Option::find($id);
         $option->update(['is_hide' => '1']);
         return response()->json($option);
     }


      // Close Option
 
      public function optionClose(Request $request, $id)
      {  
          $option = Option::find($id);
          $option->update(['status' => 'close']);
          return response()->json($option);
      }

    // Win Option

    public function optionWin(Request $request, $id)
    {
        $option = Option::find($id);
        $option->update(['is_win' => '1']);
        $question = $option->question;

        if (!empty($option->bets) && $option->bets->count()) {
            foreach ($option->bets as $key => $bet) {
                $bet->update(['status' => 'win']);
                $user = $bet->user;
                // Add Balance
                $addBalance = $user->increment('balance', $bet->return_amount);

                $transaction = new Transaction([
                    'user_id' => $user->id,	 	 
                    'debit' => 0,
                    'credit' => $bet->return_amount,
                    'description' => 'Win',
                    'balance' => $user->balance,
                        ]);
                $transaction->save();

                // Add Alart
                $alart = new Alart([
                    'user_id' => $user->id,
                    'title' => 'Hurray!, You won the bet ' . $bet->option->name . ' | ' . $bet->bet_rate,
                    'description' => 'A great news, you have win bet ' . $bet->option->name . ' | ' . $bet->bet_rate,
                    'is_viewed' => 0,
                    'is_admin_alart' => 0,
                    'is_user_alart' => 1,
                    'status' => 'show',
                ]);

                $alart->save();
            }
        }

        if (!empty($question->options) &&  $question->options->count()) {
            foreach ($question->options as $key => $option) {
                if ($option->is_win == '1') {
                    $option->update(['is_loss' => '0']);
                } else {
                    $option->update(['is_loss' => '1']);
                }
        }
        }
        
         if (!empty($question->bets) &&  $question->bets->count()) {
            foreach ($question->bets as $key => $bet) {
                if ($bet->status == 'pending') {
                    $bet->update(['status' => 'loss']);
                }
        }
        }

        return response()->json($option);
    }

}
