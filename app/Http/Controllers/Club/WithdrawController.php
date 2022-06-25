<?php

namespace App\Http\Controllers\Club;

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

        $user = auth()->user();
        $currecy = Basic::findOrFail(1)->currency_code;
        $this->validate($request, [
            'method' => 'required',
            'amount'=>'required|numeric|min:50|max:10000',
            'type' => 'required',
            'account' => 'required',
            'password' => ['required', new MatchOldPassword],
        ]);

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
        return redirect()->route('club.profile');
        }

        else{
        Toastr::error('You have not enough balance.', 'Error');
        return redirect()->route('club.profile');
        }
    }


}
