<?php

namespace App\Http\Controllers\Club;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BalanceTransfer;
use App\Models\Transaction;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;

class BalanceTransferController extends Controller
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

    public function balanceTransfer(Request $request)
    {  
        $request->validate([
            'password' => ['required', new MatchOldPassword],
            'amount' => ['required'],
            'to_username' => ['required'],

        ]);

        $fromUser = auth()->user();
        $toUser = User::where('username', $request->to_username)->first();
        $amount = $request->amount;

        if ( !empty($toUser) && $fromUser->balance > 0 && $fromUser->balance > $amount && $toUser->is_club == NULL) {
           // Add Balance Transfer
        $addBalanceTransfer = new BalanceTransfer([
            'user_id' => $fromUser->id,	 	 
            'to_username' => $toUser->username,
            'amount' => $amount,
                ]);
            $addBalanceTransfer->save();

        $fromAction = $this->fromAllAction($fromUser->id,$amount);
        $toAction = $this->toAllAction($toUser->id,$amount);

        Toastr::success('Balance transfer successfully', 'success');
        return redirect()->route('club.profile');
        }else{
            Toastr::error('Insufficient Balance or To User a Club', 'error');
            return redirect()->route('club.profile');
        }

    }

    public function fromAllAction($userid,$amount)
    {  
        $user = User::find($userid);
        // Minus Balance From User
        $minusBalance = $user->decrement('balance', $amount); 

        //Add Transaction From User
        $addTransaction = new Transaction([
            'user_id' => $userid,	 	 
            'debit' => $amount,
            'credit' => 0,
            'description' => 'Balance Transfer',
            'balance' => $user->balance,
                ]);
            $addTransaction->save();
    }

    public function toAllAction($userid,$amount)
    {  
         $user = User::find($userid);
         //Add Balance To User
         $plusBalance = $user->increment('balance', $amount);

         //Add Transaction To User
         $addTransaction = new Transaction([
            'user_id' => $userid,	 	 
            'debit' => 0,
            'credit' => $amount,
            'description' => 'Received Balance',
            'balance' => $user->balance,
                ]);
            $addTransaction->save();
    }
}
