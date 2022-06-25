<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Alart;

class QuestionController extends Controller
{  

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:Question');
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
            'match_id' => 'required',
        ]);

        $input = $request->all();
        $question = Question::create($input);
        return response()->json($question);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $question = Question::findOrFail($id);
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
        $question = Question::find($id);
        $question->fill($input)->save();
        return response()->json($question);
    }

    // Close Question

    public function closeQuestion(Request $request, $id)
    {  
        $question = Question::find($id);
        $question->update(['status' => 'close']);
        return response()->json($question);
    }

      // Question Active

      public function questionActive(Request $request, $id)
      {  
          $question = Question::find($id);
          $question->update(['is_active' => 1]);
          return response()->json($question);
      }
  
      // Question Deactive
  
      public function questionDeactive(Request $request, $id)
      {  
          $question = Question::find($id);
          $question->update(['is_active' => 0]);
          return response()->json($question);
      }

       // Question Hide

       public function questionHide(Request $request, $id)
       {  
           $question = Question::find($id);
           $question->update(['is_hide' => 1]);
           return response()->json($question);
       }  
 
      // Question Show
 
      public function questionShow(Request $request, $id)
      {  
          $question = Question::find($id);
          $question->update(['is_hide' => 0]);
          return response()->json($question);
      } 

       // Question Area Hide

    public function areaHide(Request $request, $id)
    {  
        $question = Question::find($id);
        $question->update(['is_area_hide' => 1]);
        return response()->json($question);
    }

    // Question Area Show

    public function areaShow(Request $request, $id)
    {  
        $question = Question::find($id);
        $question->update(['is_area_hide' => 0]);
        return response()->json($question);
    }

    // Option Restart

    public function questionRestart(Request $request, $id)
    {
        $question = Question::find($id);
        $options = $question->options;

        if (!empty($options) && $options->count()) {
            foreach ($options as $key => $option) {
                $option->update([
                    'is_loss' => '0',
                    'is_win' => '0'
                ]);

                if (!empty($option->bets) && $option->bets->count()) {
                    foreach ($option->bets as $key => $bet) {
                        $user = $bet->user;
                        $balance = $user->balance;

                        if ($bet->status == 'win') {
                            if ($balance >= $bet->return_amount) {
                                // Minus Balance
                                $minusBalance = $bet->user->decrement('balance', $bet->return_amount);
                            }

                            // Add Alart
                            $alart = new Alart([
                                'user_id' => $user->id,
                                'title' => 'We are really sorry for select wrong answer ' . $bet->option->name,
                                'description' => 'We are really sorry for select wrong answer ' . $bet->option->name
                                    . ' we decrease balance ' . $bet->return_amount . ' from your account',
                                'is_viewed' => 0,
                                'is_admin_alart' => 0,
                                'is_user_alart' => 1,
                                'status' => 'show',
                            ]);

                            $alart->save();
                        }

                        $bet->update(['status' => 'pending']);
                    }
                }
            }
        }

        return response()->json($question);
    }  
    
}