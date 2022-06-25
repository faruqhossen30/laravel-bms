<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gateway;
use App\Models\Deposit;
use App\Models\Alart;
use Brian2694\Toastr\Facades\Toastr;

class DepositController extends Controller
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


    public function gatewayInfo(Request $request){
        $method = $request->method;
        $gateway = Gateway::where('method', $method)->get();
        return response()->json([
            'accounts' => $gateway
        ]);
    }

    public function deposit(Request $request){

        $this->validate($request, [
            'method' => 'required',
            'amount'=>'required|numeric|min:100|max:500000',
            'from_account' => 'required',
            'to_account' => 'required',
            'transaction' => 'required'
        ]);

        $user = auth()->user();

        $last_deposit = Deposit::orderBy('id', 'desc')->where('user_id', $user->id)->first();
        if (!empty($last_deposit) && $last_deposit->status == 'pending') {
            Toastr::error('You already have a deposit request!', 'Error');
            return redirect()->route('home');
        }

        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        $insart = Deposit::create($input);

         // Send Alart To Admin
         $addAlart = new Alart([
            'user_id' => $user->id,
            'title' => 'You received a new deposit request!',
            'description' => $user->name . ' request for deposit amount ' .$request->amount,
            'is_viewed' => 0,
            'is_admin_alart' => 1,
            'is_user_alart' => 0,
            'status' => 'show',
                ]);
            $addAlart->save();

        Toastr::success('Request Submit Successfully', 'Success');
        return redirect()->route('home');
    }
}
