<?php

namespace App\Http\Controllers;
use App\Models\collosal;
use Illuminate\Http\Request;


class collosalController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $winner = $request->user()->id;
        return view('/dashboard' , compact('winner'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateEdit();
        collosal::create([
        'winner_id' => auth()->id(),
        'fullName' => request('fullName'),
        'place_of_meeting' => request('place_of_meeting') ,
        'location' => request('location'), 
        'occupation' => request('occupation'), 
        'num1' => request('num1'),
        'num2' => request('num2') , 
        'num3' => request('num3'), 
        'email' => request('email'),
        'general_comments' => request('general_comments'),
        // {*************** checkbox fields ********************}
        'not_born_again' => request()->has('not_born_again'),
        'already_born_again' => request()->has('already_born_again'),
        'got_born_again' => request()->has('got_born_again'),
        'already_in_church' => request()->has('already_in_church') ,
        'no_church' => request()->has('no_church'), 
        'HG_filled' => request()->has('HG_filled')]);
        return redirect('/dashboard');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {   
        $collosal_holder = auth()->user()->collosal;
        // $collosal_holder = collosal::where('winner_id' , auth()->id())->get();
        return view('soullist' , compact('collosal_holder'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id , collosal $collosal)
    {   
        $collosal = collosal::findOrFail($id);
        $this->authorize('update', $collosal);
        return view('soulmod' , compact('collosal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,$id)
    {       
            
            $this->validateUpdate();
            $collosal = collosal::findOrFail($id);
            $collosal->fullName = request('fullName');
            $collosal->location = request('location');
            $collosal->occupation = request('occupation');
            $collosal->num1 = request('num1');
            $collosal->num2 = request('num2');
            $collosal->num3 = request('num3');
            $collosal->general_comments = request('general_comments');
            $collosal->save();

            return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $collosal = collosal::findOrFail($id);
     $collosal->delete();
     return redirect('/soullist');
    }

    public function validateEdit()
    {
        return request()->validate([
            'fullName' =>  ['required','regex:/^[a-zA-Z-\s]*$/'],
            'place_of_meeting' =>[ 'required','regex:/^[a-zA-Z0-9-\s]*$/'],
            'location' => [ 'required','regex:/^[a-zA-Z0-9-\s]*$/'],
            'occupation' =>  ['required','regex:/^[a-zA-Z-\s]*$/'],
            'num1' => ['required' , 'digits_between:9,11'],
        ]);
    }
    public function validateUpdate()
    {
        return request()->validate([
            'fullName' => ['required','regex:/^[a-zA-Z-\s]*$/'],
            'location' => [ 'required','regex:/^[a-zA-Z0-9-\s]*$/'],
            'occupation' => ['required','regex:/^[a-zA-Z-\s]*$/'],
            'num1' => ['required' , 'digits_between:9,11'],
            // **add if statement to make required the other fields if they have something in them***
        ]);
    }
}
