<?php

namespace App\Http\Controllers\Club;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bet;
use App\Models\Withdraw;
use App\Models\BalanceTransfer;
use App\Models\Transaction;
use App\Models\Complain;
use App\Models\Alart;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $auth = auth()->user()->id;
        $club = User::findOrFail($auth);
        return view('club.profile',compact('club'));
    }

    public function changeProfile(Request $request)
    {
        $request->validate([
        'club_owner' => ['required'],
        'club_mobile' => ['required'],
        'club_address' => ['required']
    ]);

        $user = User::find(auth()->user()->id);
        $user->club_owner =  $request->club_owner;
        $user->club_mobile = $request->club_mobile;
        $user->club_address = $request->club_address;
        $user->save();
		Toastr::success('Update Successfully', 'Success');
		return redirect()->route('club.profile');
	}

   public function changePassword(Request $request){

        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        Toastr::success('Update Successfully', 'Success');
        return redirect()->route('club.profile');
    }

    public function statements()
    {
        $auth = auth()->user()->id;
        $sec = null;
        if (isset($_GET['sec'])) {
            $sec = $_GET['sec'];
        }

        if($sec &&  $sec == 'withdraw'){
            $withdraws =  Withdraw::orderBy('created_at', 'DESC')->where('user_id', $auth)->paginate(10);
            return view('club.statement.withdraw',compact('withdraws'));
        }
        if($sec &&  $sec == 'transfer'){
            $transfers = BalanceTransfer::orderBy('created_at', 'DESC')->where('user_id', $auth)->paginate(10);
            return view('club.statement.balance-transfer',compact('transfers'));
        }

        if($sec &&  $sec == 'transaction'){
            $transactions = Transaction::orderBy('created_at', 'DESC')->where('user_id', $auth)->paginate(10);
            return view('club.statement.transaction',compact('transactions'));
        }

        $bets = Bet::orderBy('created_at', 'DESC')->where('club_id', $auth)->paginate(10);
        return view('club.statement.index',compact('bets'));
    }

    public function referral()
    {
        $auth = auth()->user()->id;
        return view('club.referral');

    }

}
