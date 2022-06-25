<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bet;
use App\Models\User;
use App\Models\Option;
use App\Models\Transaction;
use App\Models\Basic;
use Brian2694\Toastr\Facades\Toastr;

class BettingController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function bet(Request $request){

        $this->validate($request, [
            'option_id' => 'required'
        ]);
        $bs = Basic::findOrFail(1);
        $user = auth()->user();
        $option = Option::findOrFail($request->option_id);
        $question = $option->question;
        $match = $question->match;
        $totalBet = $option->bets->sum('predict_amount');
        $stake = $request->predict_amount;
        
         if ($user->is_club == NULL && $user->is_admin == NULL) {
             $userCheck = true;
         }else{
             $userCheck = false;
         }
         
         if ( $match->bet_limit == 0 or $match->bet_limit >= $totalBet) {
           $matchCheck = true;  
         }
         else{
             $matchCheck = false; 
         }
         
         if ( $question->bet_limit == 0 or $question->bet_limit >= $totalBet) {
             $questionCheck = true;
         }else{
             $questionCheck = false;
         }

         if ( $option->bet_limit == 0 or $option->bet_limit >= $totalBet) {
             $optionCheck = true;
         }else{
             $optionCheck = false;
         }
         
          if ($user->balance > $stake) {
              $balanceCheck = true;
          }else{
              $balanceCheck = false;
          }
          
          // Is Run
          if($match->is_active == '1' && $question->is_active == '1' && $option->status == 'active'){
              $isRun = true;
          }else{
              $isRun = false;
          }
          
          if($option->is_win == '1' || $option->is_loss == '1'){
              $questionWined = false;
          }else{
              $questionWined = true;
          }
          
          
          if($userCheck == true){
              
              if($balanceCheck == true){
                  if ($matchCheck == true && $questionCheck == true && $optionCheck == true && $questionWined == true && $isRun == true) {
             
              // Minus Balance
                $minusBalance = $user->decrement('balance', $stake);

                    // Add Balance To Club

                    if (!empty($user->club)) {
                        $clubPercentage = $user->club->club_commission;
                        $clubCommission = ($clubPercentage / 100) * $stake;
                        $addBalanceToClub = $user->club->increment('balance', $clubCommission);

                        $transaction = new Transaction([
                        'user_id' => $user->club->id,	 	 
                        'debit' => 0,
                        'credit' => $clubCommission,
                        'description' => 'Commission',
                        'balance' => $user->club->balance,
                        ]);
                        $transaction->save();

                    }
                    else{
                        $clubCommission = NULL;
                    }
                
                    // Add Balance To Sponsor
                    if (!empty($user->sponsor)) {
                    $sponsorPercentage = $bs->sponsor_commission;
                    $sponsorCommission = ($sponsorPercentage / 100) * $stake;
                    $addBalanceToSponsor = $user->sponsor->increment('balance', $sponsorCommission);

                    $transaction = new Transaction([
                        'user_id' => $user->sponsor->id,	 	 
                        'debit' => 0,
                        'credit' => $sponsorCommission,
                        'description' => 'Commission',
                        'balance' => $user->sponsor->balance,
                        ]);
                        $transaction->save();

                    }
                    else{
                        $sponsorCommission = NULL;
                    }

                    // Add Bet
                    $input['user_id'] = $user->id;
                    $input['option_id'] = $option->id;
                    $input['match_id'] = $option->match_id;
                    $input['question_id'] = $option->question_id;
                    $input['club_id'] = $user->club_id;
                    $input['sponsor_id'] = $user->sponsor_id;
                    $input['predict_amount'] = $stake;
                    $input['return_amount'] = $stake * $option->bet_rate;
                    $input['bet_rate'] = $option->bet_rate;
                    $input['club_commission'] = $clubCommission;
                    $input['sponsor_commission'] = $sponsorCommission;
                    $input['option_name'] = $option->name;
                    $input['match_name'] = $option->match->team_one.' vs '. $option->match->team_two;
                    $input['question_name'] = $option->question->name;
                    $insart = Bet::create($input);

                    // Add Transaction
                   
                    $transaction = new Transaction([
                        'user_id' => $user->id,	 	 
                        'debit' => $stake,
                        'credit' => 0,
                        'description' => 'Bet Placed',
                        'balance' => $user->balance,
                            ]);
                    $transaction->save();
            
                    Toastr::success('Successfully Bit', 'Success');
                    return redirect()->route('index');
                    }else
                    {
                        return redirect()->route('index'); 
                    }
              }
              else{
            Toastr::error('Insufficient balance', 'error');
            return redirect()->route('index');  
              }
          }
          else{
            Toastr::error('Only user can bet.', 'error');
            return redirect()->route('index'); 
        }
    }
}
