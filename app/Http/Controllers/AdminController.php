<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Events;
use App\User;

use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $events = DB::table('users')
        ->join('events','users.id','=','events.id_user')
        ->get();
        return view('admin/home',['events' => $events]);
    }
    public function user()
    {
        $users = User::all();
        return view('admin/user',['users' => $users]);
    }
    public function change_status(request $request){
        User::where('id','=',$request->id)->update([
            'status'=>$request->status
        ]);
        // var_dump($request->status);
        return redirect(route('admin.user'));
    }
}
