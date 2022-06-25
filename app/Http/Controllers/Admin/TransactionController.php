<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Transaction;
use App\Models\User;

class TransactionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:Transaction');
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
            'type'    => $request->type
        ];

        //Transaction
        $transactions = Transaction::orderBy('id', 'DESC')
        ->where(function ($query) use ($filters) {
            if ($filters['date']) {
                $query->whereDate('created_at', '=', $filters['date']);
            }
            if ($filters['user_id']) {
                $query->where('user_id', '=', $filters['user_id']);
            }
            if ($filters['type'] && $filters['type'] != 'All') {
                $query->where('description', '=', $filters['type']);
            }
        })->paginate(100);

        return view('admin.transactions', compact('transactions'));
    }
}
