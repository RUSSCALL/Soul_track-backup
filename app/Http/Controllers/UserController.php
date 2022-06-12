<?php
   
namespace App\Http\Controllers;
use App\Models\collosal; 
use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
  
class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function searchPage(){
        return view('layouts.Admin_layouts.SoulSearch');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, collosal $collosal, User $user)
    {
        $this->authorize('adminRoleCheck', $user);
        if ($request->ajax()) {
            $data = collosal::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    // ->addColumn('action', function($row){
       
                    //         $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
      
                    //         return $btn;
                    // })
                    ->rawColumns(['action'])
                    ->make(true);
        }
          
    }
}