<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Bet;
use App\Models\Transaction;
use App\Models\Alart;
use App\Models\Basic;

class BetController extends Controller
{
    protected $bs;
    public function __construct()
    {
        $this->bs = Basic::findOrFail(1);
        $this->middleware('auth');
        $this->middleware('permission:Betting');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.bet.index');
    }

    //Betting Database
    public function betting_index(Request $request)
    {   
        //User Find
        $user_id = null;
        if ($request->user){
            $find_user_id = DB::table('tit_users')->where('username', $request->user)->get();
            if ($find_user_id->count() > 0) {
                $user_id = $find_user_id->pluck('id');
            }
        }

        //Filter
        $filters = [
            'date' => $request->date,
            'user_id'    => $user_id,
            'option' => $request->option,
            'question' => $request->question,
            'match' => $request->match,
            'status' => $request->status
        ];

        //Refund
        if ($request->has('bets') && $request->has('percentage')) {
            foreach ($request->bets as $key => $bet) {
                $betting = Bet::findOrFail($bet);
                $percentage = $request->percentage;
                $total = $betting->predict_amount;
                $amount = ($percentage / 100) * $total; 

                if ($betting->status != 'refund') {
                    $betting->update(['status' => 'refund']);

                    $user = $betting->user_id;

                     // Add Balance
                     $addBalance = $betting->user->increment('balance', $amount);

                    // Add Transaction
                    $transaction = new Transaction([
                        'user_id' => $user,	 	 
                        'debit' => 0,
                        'credit' => $amount,
                        'description' => 'Refund',
                        'balance' => $betting->user->balance,
                            ]);
                    $transaction->save();

                    // Add Alart
                    $alart = new Alart([
                        'user_id' => $user,
                        'title' => 'We refunded your bet amount ' . $amount . ' ' . $this->bs->currency_code,
                        'description' => 'Dear user, we just let to know that, we have refunded your bet amount ' . $amount,
                        'is_user_alart' => 1,
                        'is_viewed' => 0,
                        'status' => 'show',
                    ]);

                    $alart->save();
                }
            }
        }

        //Bets
        $bets = Bet::orderBy('id', 'DESC')
        ->where(function ($query) use ($filters) {
            if ($filters['date']) {
                $query->whereDate('created_at', '=', $filters['date']);
            }
            if ($filters['user_id']) {
                $query->where('user_id', '=', $filters['user_id']);
            }
            if ($filters['option']) {
               $query->where('option_id', '=', $filters['option']);
            }
            if ($filters['question']) {
                $query->where('question_name', 'like', '%'. $filters['question'] .'%');
             }
             if ($filters['match']) {
                $query->where('match_name', 'like', '%'. $filters['match'] .'%');
             }
            if ($filters['status'] && $filters['status'] != 'All') {
                $query->where('status', '=', $filters['status']);
            }
        })->paginate(100);

      return view('admin.bet.betting_index', compact('bets'));
   }
}
