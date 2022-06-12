<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\collosal;
use Illuminate\Http\Request;
use DB;


class admincontroller extends Controller
{
    public function __construct(){
        $this->middleware('auth'); 
    }

    public function index(User $user, collosal $collosal){

        $this->authorize('adminRoleCheck', $user);
        // $users = DB::table('users')->select('firstname', 'lastname')->get();
        $users = User::withCount(['collosal'])->get();
        // $soulswon = DB::table('collosal') 
        return view('layouts.Admin_layouts.adminDashboard' , compact('users'));
    }

    public function update(User $user , Request $request , $id){
        $this->authorize('SuperAdminCheck', $user);

        // validation to prevent original super_Admin from ever changing
         if( $id == 1 ){return back();}

        if(request('role_change') == 'super_Admin'){

            $user = User::findOrFail($id);
            $user->user_role_id = 1;
            $user->save();
            return redirect('/adminDashboard');
        }elseif(request('role_change') == 'Admin'){
            $user = User::findOrFail($id);
            $user->user_role_id = 2;
            $user->save();
            return redirect('/adminDashboard');

        }elseif(request('role_change') == 'Usher'){
            $user = User::findOrFail($id);
            $user->user_role_id = 4;
            $user->save();
            return redirect('/adminDashboard');

        }else{
            $user = User::findOrFail($id);
            $user->user_role_id = 3;
            $user->save();
            return redirect('/adminDashboard');


        }


    }
}

