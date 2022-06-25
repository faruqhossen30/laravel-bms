<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Complain;

class ComplainController extends Controller
{  

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:Complain');
    }

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
            'status'    => $request->status
        ];

        //Complains
        $complains = Complain::orderBy('id', 'DESC')
        ->where(function ($query) use ($filters) {
            if ($filters['date']) {
                $query->whereDate('created_at', '=', $filters['date']);
            }
            if ($filters['user_id']) {
                $query->where('user_id', '=', $filters['user_id']);
            }
            if ($filters['status'] && $filters['status'] != 'All') {
                $query->where('status', '=', $filters['status']);
            }
        })->paginate(100);

        return view('admin.complains',compact('complains'));
    }

    public function complain_solved(Request $request, $id)
    {
        $complain = Complain::find($id);
        $complain->status = 'solved';
        $complain->save();
        return response()->json([
            'success' => 'yes',
            'message' =>'Compain Update Successfully'
        ]);
    }
}
