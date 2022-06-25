<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gateway;

class GatewayController extends Controller
{  

   public function __construct()
   {
    $this->middleware('auth');
    $this->middleware('permission:Payment');
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $gateways = Gateway::orderBy('id','DESC')->get();
     return view('admin.gateway.index',compact('gateways'));
 }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function gateway_edit($id)
    {
        $gateway = Gateway::findOrFail($id);
        return view('admin.gateway.edit', compact('gateway'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function gateway_update(Request $request)
    {   
        $id = $request->id;
        $gateway = Gateway::findOrFail($id);

        $this->validate($request, [
            'account_number' => 'required',
            'method' => 'required',
            'type' => 'required',
            'status' => 'required',
        ]);

        $input = $request->all();
        $update = $gateway->fill($input)->save();       
        return response()->json([
            'success' => 'yes',
            'message' => 'Gateway Update Successfully!',
        ]);
    }
}
