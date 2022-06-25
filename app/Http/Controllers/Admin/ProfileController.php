<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function profile()
	{
		$user = User::find(auth()->user()->id);
		return view('admin.user.profile',compact('user'));
	}

	public function updateProfile(Request $request)
	{   $user = User::find(auth()->user()->id);
		$id = $user->id;
		$this->validate($request, [
			'name' => 'required',
			'email' => 'required|email|unique:tit_users,email,'.$id,
			'mobile' => 'required|unique:tit_users,mobile,'.$id,
			'password' => 'same:confirm-password',

		]);

		$input = $request->all();
		if ($request->has('password')) { $input['password'] =  Hash::make($request->password); };
		$user->update($input);
		Toastr::success('Update Successfully', 'Success');
		return redirect()->route('admin.dashboard');
	}

	public function changePassword()
	{
		return view('admin.user.password');
	}

	public function updatePassword(Request $request)
	{
		$request->validate([
			'current_password' => ['required', new MatchOldPassword],
			'new_password' => ['required'],
			'new_confirm_password' => ['same:new_password'],
		]);

		User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

		Toastr::success('Update Successfully', 'Success');
		return redirect()->route('admin.dashboard');

	}
}
