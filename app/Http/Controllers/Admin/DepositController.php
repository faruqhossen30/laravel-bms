<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Deposit;
use App\Models\Transaction;
use App\Models\Alart;
use App\Models\Basic;

class DepositController extends Controller
{   
    protected $bs;
    public function __construct()
    {   $this->bs = Basic::findOrFail(1);
        $this->middleware('auth');
        $this->middleware('permission:Deposit');
    }

    /**
     * Data
     */
    public function index(Request $request)
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
            'method' => $request->method,
            'status'    => $request->status
        ];

        //Deposits
        $deposits = Deposit::orderBy('id', 'DESC')
        ->where(function ($query) use ($filters) {
            if ($filters['date']) {
                $query->whereDate('created_at', '=', $filters['date']);
            }
            if ($filters['user_id']) {
                $query->where('user_id', '=', $filters['user_id']);
            }
            if ($filters['method'] && $filters['method'] != 'All') {
                $query->where('method', '=', $filters['method']);
            }
            if ($filters['status'] && $filters['status'] != 'All') {
                $query->where('status', '=', $filters['status']);
            }
        })->paginate(100);

        return view('admin.deposits', compact('deposits'));
    }

    /**
     * Deposit Accept
     */

     public function deposit_accept(Request $request, $id){
        $deposit = Deposit::findOrFail($id);
        if($deposit->status == 'pending'){
        $deposit->update(['status' => 'complete']);

        // Add Balance
        $addBalance = $deposit->user->increment('balance',$deposit->amount);
        $user_id = $deposit->user_id;
        
        // Add Transaction
        $transaction = new Transaction([
            'user_id' => $user_id,
            'debit' => 0,
            'credit' => $deposit->amount,
            'description' => 'Deposit',
            'balance' => $deposit->user->balance,
        ]);
        $transaction->save();

        // Add Alart
        $alart = new Alart([
            'user_id' => $user_id,
            'title' => 'Add balance to your account!',
            'description' => 'Successfully added balance to your account',
            'is_user_alart' => 1,
            'is_viewed' => 0,
            'status' => 'show',
        ]);

        $alart->save();
        return response()->json([
            'success' => 'yes',
            'message' => 'Deposit Accept Successfully!',
        ]);
        }else{
            return response()->json([
                'success' => 'no',
                'message' => 'Deposit Already Accepted!',
            ]);
        }
     }

     public function  deposit_cancel(Request $request, $id){
        $deposit = Deposit::findOrFail($id);
        if($deposit->status == 'pending'){
            $deposit->update(['status' => 'cancel']);
            $user_id = $deposit->user_id;
    
             // Add Alart
             $alart = new Alart([
                'user_id' => $user_id,
                'title' => 'Deposit request cancel!',
                'description' => 'Sorry, We have cancelled your deposit request',
                'is_user_alart' => 1,
                'is_viewed' => 0,
                'status' => 'show',
            ]);
    
            $alart->save();

            return response()->json([
                'success' => 'yes',
                'message' => 'Deposit Cancel Successfully!',
            ]);
        }else{

            return response()->json([
                'success' => 'no',
                'message' => 'Deposit Already Cancelled!',
            ]);
        }
     }

}
