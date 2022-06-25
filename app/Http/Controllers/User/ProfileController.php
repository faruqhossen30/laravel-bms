<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bet;
use App\Models\Deposit;
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
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {  
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $auth = auth()->user()->id;
        $user = User::findOrFail($auth);
        $betCount = Bet::where('user_id', $auth)->count();
        $winCount = Bet::where('user_id',$auth)->where('status', 'win')->count();
        return view('auth.account.profile',compact('user','betCount','winCount')); 
    }
    public function changeProfile(Request $request)
    {   
        $request->validate([
        'password' => ['required', new MatchOldPassword],
        'club_id' => ['required'],
    ]);
        
        $user = User::find(auth()->user()->id);
		$user->update(['club_id'=> $request->club_id]);
		Toastr::success('Update Successfully', 'Success');
		return redirect()->route('home');
	}

   public function changePassword(Request $request){

        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        Toastr::success('Update Successfully', 'Success');
        return redirect()->route('home');
    }

    public function statements()
    {   
        $auth = auth()->user()->id;
        $bets = Bet::orderBy('created_at', 'DESC')->where('user_id', $auth)->paginate(10);
        $deposits = Deposit::orderBy('created_at', 'DESC')->where('user_id', $auth)->paginate(10);
        $withdraws =  Withdraw::orderBy('created_at', 'DESC')->where('user_id', $auth)->paginate(10);
        $transfers = BalanceTransfer::orderBy('created_at', 'DESC')->where('user_id', $auth)->paginate(10);
        $transactions = Transaction::orderBy('created_at', 'DESC')->where('user_id', $auth)->paginate(10);
        return view('auth.statement.index',compact('bets','deposits','withdraws','transfers','transactions')); 
    }

    public function submitComplain(Request $request)
    {
        $this->validate($request, [
            'contact_number' => 'required',
            'message' => 'required'
        ]);

        $user = auth()->user();

        $input = $request->all();
        $input['user_id'] = $user->id;
        $input['status'] = 'waiting';
        $insart = Complain::create($input);

         // Send Alart To Admin

         $addAlart = new Alart([
            'user_id' => $user->id,
            'title' => 'You received a new complain!',
            'description' => $user->name . ' submit a new complain',
            'is_viewed' => 0,
            'is_admin_alart' => 1,
            'is_user_alart' => 0,
            'status' => 'show',
                ]);
            $addAlart->save();

        Toastr::success('Request Submit Successfully', 'Success');
        return redirect()->back();
    }

    public function alart()
    {   $auth = auth()->user()->id;
        $alarts = Alart::orderBy('id', 'DESC')->where('user_id', $auth)->where('is_user_alart','1')->where('is_viewed','0')->where('status','show')->get();
        return view('auth.alart',compact('alarts'));  
    }

    public function alartCount()
    {   $auth = auth()->user()->id;
        $alart = Alart::orderBy('id', 'DESC')->where('user_id', $auth)->where('is_user_alart','1')->where('is_viewed','0')->where('status','show')->count();
        return response()->json($alart);
    }

     public function updateAlart(Request $request) {
        $data = Alart::find($request->alart_id);
        $data->is_viewed = 1;
        $data->save ();
        return response()->json($data);
    }
 

}
