<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;


class attendanceController extends Controller
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
        $entries_made = Attendance::whereDate('created_at', '>=' , date('Y-m-d'))->count();

        $this->authorize('usherRoleCheck' , $user);
        // code to get current system date and return count on the number of entries into the db
        return view('layouts.Attendance_layouts.attendance_form',compact('entries_made'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // vaildation for everything is required
        request()->validate([
            // regex is for names with whitespaces numbers and hypens
            'fullName' => ['required','regex:/^[a-zA-Z-\s]*$/'],
            'residence' =>[ 'required','regex:/^[a-zA-Z0-9-\s]*$/'],
            'cell' => [ 'required','regex:/^[a-zA-Z0-9-\s]*$/'],
            'email' => [ 'required','email'],
            'invited' => [ 'required','regex:/^[a-zA-Z\s]*$/'],
            'DOB' => [ 'required','date'],
            'number' => 'digits_between:9,11'
        ]);
        Attendance::create([
            "fullName" => request('fullName'),
            "residence" => request('residence'),
            "number" => request('number'),
            "email" => request('email'),
            "cell" => request('cell'),
            "date_of_birth" => request('DOB'),
            "invited_by" => request('invited'),
            "first_timer_check" => request()->Has('Firsttimer')
        ]);

        return Back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
