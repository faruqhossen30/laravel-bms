<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class UserController extends Controller
{   

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:User');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Filter
        $filters = [
            'name' => $request->name,
            'username' => $request->username,
            'mobile'    => $request->mobile,
            'status'    => $request->status
        ];

        //Users
        $users = User::orderBy('name','ASC')->where('is_admin',NULL)->where('is_club',NULL)
        ->where(function ($query) use ($filters) {
            if ($filters['name']) {
                $query->where('name', 'like', '%'.$filters['name'].'%');
            }
            if ($filters['username']) {
                $query->where('username', '=', $filters['username']);
            }
            if ($filters['mobile']) {
                $query->where('mobile', '=', $filters['mobile']);
            }
            if ($filters['status'] && $filters['status'] != 'All') {
                $query->where('status', '=', $filters['status']);
            }
        })->paginate(100);
        
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:tit_users,email',
            'mobile' => 'required',
            'username' => 'required|unique:tit_users,username',
            'club_id' => ['required', 'string'],
            'sponsor' => ['required', 'string'],
            'password' => 'required|same:confirm-password'
        ]);

        $sponsor = User::where('username', $request->sponsor)->first();
        if($sponsor !== null) {
            $sponsorId = $sponsor->id;
          }
          else{
              $sponsorId = NULL; 
          }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['is_admin'] = NULL;
        $input['is_club'] = NULL;
        $input['sponsor_id'] = $sponsorId;
        $user = User::create($input);

        return redirect('tib-admin/users')
        ->with('success', 'User Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:tit_users,email,'.$id,
            'mobile' => 'required',
            'username' => 'required|unique:tit_users,username,'.$id,
            'club_id' => ['required', 'string'],
            'sponsor' => ['required', 'string'],
            'password' => 'same:confirm-password',

        ]);

        $sponsor = User::where('username', $request->sponsor)->first();
        if($sponsor !== null) {
            $sponsorId = $sponsor->id;
          }
          else{
              $sponsorId = NULL; 
          }

        $input = $request->all();
        $input['sponsor_id'] = $sponsorId;
       if ($request->has('password')) { $input['password'] =  Hash::make($request->password); };
        $user = User::find($id);
        $user->update($input);

        return redirect('tib-admin/users')
        ->with('success', 'User Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       User::find($id)->delete();

       return response()->json([
        'success' => 'yes',
        'message' => 'User Delete Successfully!',
    ]);
    }
}
