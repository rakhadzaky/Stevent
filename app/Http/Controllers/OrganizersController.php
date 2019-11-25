<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Events;
use App\Citys;
use App\Provinces;
use App\Tickets;

use Illuminate\Support\Facades\Validator;

use Request as RequestFacade;
use File;

use Illuminate\Support\Facades\DB;

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
            'judul' => 'required|max:100',
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
        $event->status = 'Step 1';
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
            'harga' => $request->harga,
            'status' => 'Step 2',
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
                'sampul' => $filename,
                'status' => 'Step 3',
            ]);
            return redirect(route('organizers.dashboard',['id_event' => $request->id_event]));
        }
    }
    public function dashboard($id_event){
        $event = DB::table('events')
            ->join('users','events.id_user','=','users.id')
            ->where('events.id_event','=',$id_event)
            ->where('events.id_user','=',Auth::user()->id)
            ->first();
        $provinces = Provinces::all();
        $citys = Citys::all();
        return view('organizers/dashboard',['event' => $event, 'provinces' => $provinces, 'citys' => $citys]);
    }
    public function settings($id_event){
        $event = Events::find($id_event);
        return view('organizers/setting',['event' => $event]);
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
    public function ticketList($id_event){
        $event = Events::find($id_event);
        $ticket = DB::table('tickets')
            ->join('events','tickets.id_event','=','events.id_event')
            ->join('users','tickets.user_id','=','users.id')
            ->where('events.id_event','=',$id_event)
            ->where('events.id_user','=',Auth::user()->id)
            ->get();
        return view('organizers/ticket',['tickets' => $ticket,'event' => $event]);
    }

    public function confirmTicket(Request $req, $id_event){
        Tickets::where('ticket_id','=',$req->id_ticket)->update([
            'payment_status' => 'confirmed',
        ]);
        return redirect(route('organizers.ticket',['id_event' => $id_event]));
    }

    public function checkTicket(Request $req, $id_event){
        Tickets::where('ticket_id','=',$req->id_ticket)->update([
            'payment_status' => 'checkIn',
        ]);
        return redirect(route('organizers.ticket',['id_event' => $id_event]));
    }

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
        Events::where('id_event','=',$id)->delete();
        return redirect(route('organizers.index'));
    }
    public function UpdateTitle(Request $req){
        Events::where('id_event','=',$req->change_title_id)->update(['judul' => $req->changeJudul]);
        return redirect(route('organizers.dashboard',['id_event' => $req->change_title_id]));
    }
    public function UpdateLocation(Request $req){
        Events::where('id_event','=',$req->change_title_id)->update(['tempat' => $req->kota,'provinsi' => $req->provin]);
        return redirect(route('organizers.dashboard',['id_event' => $req->change_title_id]));
    }
    public function UpdatePrice(Request $req){
        Events::where('id_event','=',$req->change_title_id)->update(['harga' => $req->changePrice]);
        return redirect(route('organizers.dashboard',['id_event' => $req->change_title_id]));
    }
    public function UpdateDesc(Request $req){
        Events::where('id_event','=',$req->change_title_id)->update(['deskripsi' => $req->changeDesc]);
        return redirect(route('organizers.dashboard',['id_event' => $req->change_title_id]));
    }
}
