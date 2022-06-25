<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
Use Response;

class DataValidationController extends Controller
{
	public function userEmailCheck(Request $request)
	{

	$data = $request->all(); // This will get all the request data.
	$userCount = User::where('email', $data['email']);
	if ($userCount->count()) {
		return Response::json(array('msg' => 'true'));
	} else {
		return Response::json(array('msg' => 'false'));
	}
}

public function userUsernameCheck(Request $request)
	{

	$data = $request->all(); // This will get all the request data.
	$userCount = User::where('username', $data['username']);
	if ($userCount->count()) {
		return Response::json(array('msg' => 'true'));
	} else {
		return Response::json(array('msg' => 'false'));
	}
}

}
