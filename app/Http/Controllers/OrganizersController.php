<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Events;

class OrganizersController extends Controller
{
    public function index()
    {
        $events = Events::where('id_user','=',Auth::user()->id)->get();
        return view('organizers/home',['events' => $events]);
    }
    public function createStepOne(){
        return view('organizers/insert');
    }
    public function createStepTwo(){
        return view('organizers/insertTwo');
    }
    public function createStepThree(){
        return view('organizers/insertThree');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('post/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $event = new Events;
        $event->judul = $request->judul;
        $event->tempat = $request->tempat;
        $event->deskripsi = $request->deskripsi;
        $event->id_user = Auth::user()->id;
        $event->save();
        
        redirect(route('home'));
    }
    public function dashboard(){
        return view('organizers/dashboard');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
