<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Withdraw;
use App\Models\Alart;
use App\Models\Transaction;
use App\Models\Basic;

class WithdrawController extends Controller
{
    protected $bs;

    public function __construct()
    {
        $this->bs = Basic::findOrFail(1);
        $this->middleware('auth');
        $this->middleware('permission:Withdraw');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //User Find
        $user_id = null;
        if ($request->user) {
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

        //Withdraws
        $withdraws = Withdraw::orderBy('id', 'DESC')
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

        return view('admin.withdraws', compact('withdraws'));
    }


    public function withdraw_complete(Request $request, $id)
    {
        $withdraw = Withdraw::findOrFail($id);
        if ($withdraw->status == 'pending') {
            $withdraw->update(['status' => 'complete']);
            $user_id = $withdraw->user_id;
            // Add Alart
            $alart = new Alart([
                'user_id' => $user_id,
                'title' => 'Your withdraw complete!',
                'description' => 'We sent ' . $withdraw->amount . ' ' . $this->bs->currency_code . ' to your ' . $withdraw->method . ' Account ' . $withdraw->account,
                'is_user_alart' => 1,
                'is_viewed' => 0,
                'status' => 'show',
            ]);
            $alart->save();
            return response()->json([
                'success' => 'yes',
                'message' => 'Withdraw Complete Successfully!',
            ]);
        } else {
            return response()->json([
                'success' => 'no',
                'message' => 'Withdraw Already Completed!',
            ]);
        }
    }

    public function  withdraw_cancel(Request $request, $id)
    {
        $withdraw = Withdraw::findOrFail($id);
        if ($withdraw->status == 'pending') {
            $withdraw->update(['status' => 'cancel']);
            $user_id = $withdraw->user_id;

            // Add Alart
            $alart = new Alart([
                'user_id' => $user_id,
                'title' => 'Your withdraw cancel!',
                'description' => 'Just to let you know — we have cancel your withdraw',
                'is_user_alart' => 1,
                'is_viewed' => 0,
                'status' => 'show',
            ]);
            $alart->save();

            // Return Amount To Account
            $return = $withdraw->user->increment('balance', $withdraw->amount);

            // Add Transaction
            $transaction = new Transaction([
                'user_id' => $user_id,
                'debit' => 0,
                'credit' => $withdraw->amount,
                'description' => 'Refund',
                'balance' => $withdraw->user->balance,
            ]);
            $transaction->save();

            return response()->json([
                'success' => 'yes',
                'message' => 'Withdraw Cancel Successfully!',
            ]);
        } else {
            return response()->json([
                'success' => 'no',
                'message' => 'Withdraw Already Cancled!',
            ]);
        }
    }

    public function widthdrawOnOff(Request $request)
    {
        $value = $request->withdraw_system;

        if ($value == 'on') {
            option(['withdraw_system' => 'on']);
            return redirect()->back();
        } else {
            option(['withdraw_system' => 'off']);
            return redirect()->back();
        }
    }
}
