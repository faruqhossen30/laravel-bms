<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Withdraw;
use App\Models\Transaction;
use App\Models\Basic;
use App\Models\Alart;
use App\Rules\MatchOldPassword;
use Brian2694\Toastr\Facades\Toastr;

class WithdrawController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function withdraw(Request $request){
        if(option('withdraw_system') == 'off'){
            return abort(403);
        }
        $user = auth()->user();
        $currecy = Basic::findOrFail(1)->currency_code;
        $this->validate($request, [
            'method' => 'required',
            'amount'=>'required|numeric|min:500|max:50000',
            'type' => 'required',
            'account' => 'required',
            'password' => ['required', new MatchOldPassword],
        ]);
        $last_withdraw = Withdraw::orderBy('id', 'desc')->where('user_id', $user->id)->first();
        if (!empty($last_withdraw) && $last_withdraw->status == 'pending') {
            Toastr::error('You already have a withdraw request!', 'Error');
            return redirect()->route('home');
        }

        if($user->balance > 0 && $user->balance > $request->amount){

        $input = $request->all();
        $input['user_id'] = $user->id;
        $insart = Withdraw::create($input);

        // Decrease balance
        $minusBalance = $user->decrement('balance', $request->amount);

        // Add Transaction
        $transaction = new Transaction([
            'user_id' => $user->id,
            'debit' => $request->amount,
            'credit' => 0,
            'description' => 'Withdraw',
            'balance' => $user->balance,
        ]);
        $transaction->save();

        // Send Alart To Admin

        $addAlart = new Alart([
        'user_id' => $user->id,
        'title' => 'You received a new withdraw request!',
        'description' => $user->name . ' request for withdraw amount ' .$request->amount,
        'is_viewed' => 0,
        'is_admin_alart' => 1,
        'url' => route('withdraws.show',$insart->id),
        'is_user_alart' => 0,
        'status' => 'show',
            ]);
        $addAlart->save();

        Toastr::success('Request Submit Successfully', 'Success');
        return redirect()->route('home');
        }

        else{
        Toastr::error('You have not enough balance.', 'Error');
        return redirect()->route('home');
        }
    }
}
