<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;
use App\Tickets;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $events = Events::all();
        $search = "";
        return view('home', ['events' => $events, 'search' => $search]);
    }
    public function event($id){
        $events = Events::find($id);
        return view('event', ['events' => $events]);
    }
    public function getTicket($id_event){
        $ticket = new Tickets;
        $ticket->id_event = $id_event;
        $ticket->user_id = Auth::user()->id;
        $ticket->payment_status = 'pending';
        $ticket->save();

        return redirect(route('myTicket'));
    }
    public function deleteTicket($id_ticket){
        Tickets::where('ticket_id','=',$id_ticket)->where('user_id','=',Auth::user()->id)->delete();
        return redirect(route('myTicket'));
    }
    public function search(Request $request){
        $events = Events::where('judul','like','%'.$request->search.'%')->get();
        $search = $request->search;
        return view('home', ['events' => $events, 'search' => $search]);
    }
    public function myTicket(){
        $tickets = Events::join('tickets','tickets.id_event','=','events.id_event')->where('user_id','=',Auth::user()->id)->get();
        return view('myTickets',['tickets' => $tickets]);
    }
    
    public function searchJS($value){
        $search = Events::where('judul','like','%'.$value.'%')
            // ->orwhere('tempat','like','%'.$value->search.'%')
            // ->orwhere('provinsi','like','%'.$value->search.'%')
            // ->orwhere('deskripsi','like','%'.$value->search.'%')
            // ->orwhere('jadwal','like','%'.$value->search.'%')
            ->get();
        
        return response()->json([
            'content' => $search,
        ]);
        
    }
}
