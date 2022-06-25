<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\BalanceTransfer;

class BalanceTransferController extends Controller
{   

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:Balance');
    }


    public function index(Request $request)
    {
        //User Find
        $from_user_id = null;
        if ($request->from_username){
            $find_from_user_id = DB::table('tit_users')->where('username', $request->from_username)->get();
            if ($find_from_user_id->count() > 0) {
                $from_user_id = $find_from_user_id->pluck('id');
            }
        }

        //To User Find
        $to_user = null;
        if ($request->to_username){
            $find_to_user = DB::table('tit_users')->where('username', $request->to_username)->get();
            if ($find_to_user->count() > 0) {
                $to_user = $find_to_user->pluck('username');
            }
        }

        //Filter
        $filters = [
            'date' => $request->date,
            'from_user_id'    => $from_user_id,
            'to_user' => $to_user,
        ];

        //Balance Transfers
        $transfers = BalanceTransfer::orderBy('id', 'DESC')
        ->where(function ($query) use ($filters) {
            if ($filters['date']) {
                $query->whereDate('created_at', '=', $filters['date']);
            }
            if ($filters['from_user_id']) {
                $query->where('user_id', '=', $filters['from_user_id']);
            }
            if ($filters['to_user']) {
                $query->where('to_username', '=', $filters['to_user']);
            }
        })->paginate(100);

        return view('admin.balance-transfers',compact('transfers'));
    }
}
