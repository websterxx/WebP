<?php

namespace App\Http\Controllers;

use App\Models\Ressource;
use App\Models\User;
use App\Models\Anomalie;
use App\Models\Ticket;
use Illuminate\Http\Request;
use DB;

class CreateTicketController extends Controller
{
    public function index(Ressource $ressource){
        $user = User::find($ressource->user_id);
        $anomalies = Anomalie::get();
        //$user = DB::select('SELECT * from users where id= ?',[$ressource->user_id]);
        return view('createticket',[
            'ressource' => $ressource,
            'user' => $user,
            'anomalies' => $anomalies,
        ]);
    }

    public function store(Request $request, Ressource $ressource){
        $user = User::find($ressource->user_id);

        Ticket::create([
            'user_id' => $user->id,
            'anomalie_id' => $request->anomalie,
            'ressource_id' => $ressource->id,
            'description' => $request->description,
        ]);

        // redirect 
        return redirect()->back();
  }


}
