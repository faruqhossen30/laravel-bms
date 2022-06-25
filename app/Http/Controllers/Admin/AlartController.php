<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Alart;

class AlartController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:Alart');
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
            'user_id'    => $user_id
        ];

        //Notifications
        $notifications = Alart::orderBy('id', 'DESC')
        ->where('is_admin_alart',1)
        ->where(function ($query) use ($filters) {
            if ($filters['date']) {
                $query->whereDate('created_at', '=', $filters['date']);
            }
            if ($filters['user_id']) {
                $query->where('user_id', '=', $filters['user_id']);
            }
        })->paginate(100);

        return view('admin.notifications',compact('notifications'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $data = Alart::findOrFail($id);
        if ($data->is_admin_alart == 1) {
            $data->update(['is_viewed' => 1]);
        }
        
        return redirect('tib-admin/notifications');
    }

    //Notifications
    public function notifications_top()
    {
        $notifications = Alart::orderBy('id','DESC')->where('is_admin_alart',1)->where('is_viewed',0)->get();
        if (!empty($notifications) && $notifications->count()) {
            foreach ($notifications as $key => $notification) {
                $id = $notification->id;
                $title = $notification->title;
                $created = $notification->created_at;
                $date = date("d M Y", strtotime($created));
                $time = date("h:i A", strtotime($created));
    
                $return_arr[] = array(
                    "id" => $id,
                    "title" => $title,
                    "date" => $date,
                    "time" => $time
                );
            }
            return response()->json($return_arr);
        }
    }
}
