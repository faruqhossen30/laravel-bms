<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Basic;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:Setting');
    }

    public function setting()
	{
		$setting = Basic::find(1);
		return view('admin.setting',compact('setting'));
	}

	public function setting_update(Request $request)
	{   
		$setting = Basic::find(1);
		$this->validate($request, [
			'site_name' => 'required',
			'site_title' => 'required',
			'currency' => 'required',
			'currency_code' => 'required',
			'currency_symbol' => 'required',
			'club_commission' => 'required',
			'sponsor_commission' => 'required',
		]);

		$input = $request->all();
		$setting->update($input);

		return redirect('tib-admin');
	}
}
