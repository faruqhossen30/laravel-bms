<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ClubController extends Controller
{
    public function __construct()
    {   $this->middleware('auth');
        $this->middleware('permission:Club');
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
            'club_name' => $request->club_name,
            'username' => $request->username,
            'status'    => $request->status
        ];

        //Clubs
        $clubs = User::orderBy('id', 'DESC')
        ->where('is_club',1)
        ->where(function ($query) use ($filters) {
            if ($filters['club_name']) {
                $query->where('name','LIKE','%'.$filters['club_name'].'%');
            }
            if ($filters['username']) {
                $query->where('username', '=', $filters['username']);
            }
            if ($filters['status'] && $filters['status'] != 'All') {
                $query->where('status', '=', $filters['status']);
            }
        })->paginate(100);

        return view('admin.club.index',compact('clubs'));
    }

    //Create
    public function create()
    {
        return view('admin.club.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:tit_users'],
            'username' => ['required', 'string', 'max:255', 'regex:/^[A-Za-z][A-Za-z0-9]*$/', 'unique:tit_users'],
            'mobile' => 'required',
            'club_owner' => 'required',
            'club_mobile' => 'required',
            'club_address' => 'required',
            'club_commission' => 'required',
            'password' => 'required',
            'status' => 'required'
        ]);

        $input = $request->all();
        $input['is_club'] = 1;
        $input['password'] = Hash::make($request->password);
        $club = User::create($input);

        return redirect('tib-admin/club')
        ->with('success','Club added successfully!');
    }

    public function show($id)
    {
        $club = User::find($id);
        return view('admin.club.show',compact('club'));   
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $club = User::find($id);
        return view('admin.club.edit',compact('club'));   
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
        $input = $request->all();
        if ($request->has('password')) { $input['password'] =  Hash::make($request->password); };
        $club = User::find($id);
        $club->fill($input)->save();
        return redirect('tib-admin/club')
        ->with('success','Club update successfully!');
    }
}
