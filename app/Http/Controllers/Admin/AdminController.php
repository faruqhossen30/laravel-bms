<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;

class AdminController extends Controller
{   

     public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:Admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::where('is_admin','1')->orderBy('id','DESC')->get();
        return view('admin.admin.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('admin.admin.create',compact('roles'));
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
            'mobile' => 'required|unique:tit_users,mobile',
            'username' => 'required|unique:tit_users,username',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'

        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['is_admin'] = 1;
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        return redirect('tib-admin/admins')
        ->with('success', 'Admin Added Successfully');
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
        return view('admin.admin.show',compact('user'));
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
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('admin.admin.edit',compact('user','roles','userRole'));
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
            'mobile' => 'required|unique:tit_users,mobile,'.$id,
            'username' => 'required|unique:tit_users,username,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'

        ]);

        $input = $request->all();
       if ($request->has('password')) { $input['password'] =  Hash::make($request->password); };
        $user = User::find($id);
        $user->update($input);
        DB::table('tit_model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));

        return redirect('tib-admin/admins')
        ->with('success', 'Admin Update Successfully');
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
            'message' => 'Admin Delete Successfully!',
        ]);
    }
}
