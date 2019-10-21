<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Events;
use App\Citys;
use App\Provinces;

use Illuminate\Support\Facades\Validator;

use Request as RequestFacade;
use File;

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
    public function storeOne(Request $request){
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect(route('organizers.create.one'))
                        ->withErrors($validator)
                        ->withInput();
        }

        $event = new Events;
        $event->judul = $request->judul;
        $event->deskripsi = $request->deskripsi;
        $event->id_user = Auth::user()->id;
        $event->save();

        $event_id = $event->id_event;
        
        return redirect(route('organizers.create.two',['id_event' => $event_id]));
    }
    public function createStepTwo($id_event){
        $provinces = Provinces::all();
        $citys = Citys::all();
        return view('organizers/insertTwo',['id_event' => $id_event,'provinces' => $provinces,'citys' => $citys]);
    }
    public function storeTwo(Request $request){
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'provin' => 'required',
            'kota' => 'required',
            'harga' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect(route('organizers.create.two',['id_event' => $request->id_event]))
                        ->withErrors($validator)
                        ->withInput();
        }

        Events::where('id_event',$request->id_event)->update([
            'jadwal' => $request->tanggal,
            'provinsi' => $request->provin,
            'tempat' => $request->kota,
            'harga' => $request->harga
        ]);
        
        return redirect(route('organizers.create.three',['id_event' => $request->id_event]));
    }
    public function createStepThree($id_event){
        return view('organizers/insertThree',['id_event' => $id_event]);
    }
    public function storeThree(Request $request)
    {
        if(RequestFacade::hasFile('file_cover')){
            $file = RequestFacade::file('file_cover');
            $filename = $file->getClientOriginalName();
            $path = public_path().'/img/event/';
            $file->move($path, $filename);
            Events::where('id_event','=',$request->id_event)->update([
                'sampul' => $filename
            ]);
            return redirect(route('event',['id_event' => $request->id_event]));
        }
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
