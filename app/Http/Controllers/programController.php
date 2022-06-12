<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\User;
use DB;


class programController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {   
        $this->authorize('adminRoleCheck' , $user);
        
        // prevents creating multiple programs before ending an existing one
        if(Program::Where('user_role_name' , 'super_Admin')->where('active_bool' , 1)->exists()){
            return view('layouts.Admin_layouts.program_create')->with('toggle' , '1');
        }else{
            return view('layouts.Admin_layouts.program_create')->with('toggle' , '0');
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Program $program, Request $request)
    {

        //validation
        request()->validate([
            'program_name' => 'required',
            'indivTarget' => ['required', 'numeric'],
            'totalTarget' => 'required',
        ]);

        Program::create([
            'user_role_name' => $request->user()->roles->role_name,
            'program_name' => request('program_name'),
            'indivTargetAttendance' => request('indivTarget') ,
            'totalTargetAttendance' => request('totalTarget')
        ]);

        return back();        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Program $program)
    {
        //validation 
        request()->validate([
            'InviteeName' => 'required',
            'contact' => 'required',
            'location' => 'required',
        ]);

        $holder = Program::Where('user_role_name' , 'super_Admin')->where('active_bool' , 1)->
        whereNull('user_id')->take(1)->get();

        foreach($holder as $hold){
            Program::create([
                'user_role_name' => $request->user()->roles->role_name,
                'program_name' => $hold->program_name,
                'indivTargetAttendance' => $hold->indivTargetAttendance ,
                'totalTargetAttendance' => $hold->totalTargetAttendance,
                'user_id'=> auth()->id(),
                'name'=> request('InviteeName'),
                'contact'=> request('contact'),
                'location'=> request('location'),
                'status'=> request()->has('status') 
            ]);
            return back();
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
        
        $gimme = Program::where('active_bool' , 1)->value('program_name');
        // dd($gimme);
        return view('programs')->with('progName' , $gimme);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $programs , User $user)
    {
        $this->authorize('SuperAdminCheck' , $user);
        DB::table('programs')->update(['active_bool' => 0]);
        return back();
    }

}
