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
    public function index(Ressource $ressource)
    {
        $user = User::find($ressource->user_id);
        $anomalies = Anomalie::get();
        //$user = DB::select('SELECT * from users where id= ?',[$ressource->user_id]);
        return view('createticket', [
            'ressource' => $ressource,
            'user' => $user,
            'anomalies' => $anomalies,
        ]);
    }

    public function store(Request $request, Ressource $ressource)
    {
        $user = User::find($ressource->user_id);

        if ($request->description == null) {
            $errors = ['Veuillez choisir un nom valide'];
            return redirect()->back()->withErrors($errors);
        }
        else{
            if ($request->anomalie == 1) {
                Anomalie::create([
                    'name' => $request->description,
                ]);
    
                $anomalie = DB::table('anomalies')
                    ->select('anomalies.*')
                    ->where('name', '=', $request->description)
                    ->get()->first();
    
                Ticket::create([
                    'user_id' => $user->id,
                    'anomalie_id' => $anomalie->id,
                    'ressource_id' => $ressource->id,
                    'description' => $request->description,
                ]);
    
                return redirect()->back();
            } else {
    
                $ticket = DB::table('tickets')
                    ->where('anomalie_id', '=', $request->anomalie)
                    ->where('ressource_id', '=', $ressource->id)
                    ->first();
    
                if (is_null($ticket)) {
                    Ticket::create([
                        'user_id' => $user->id,
                        'anomalie_id' => $request->anomalie,
                        'ressource_id' => $ressource->id,
                        'description' => 'null',
                    ]);
                    return redirect()->back();
                } else {
                    $errors = ['Cette anomalie est déja déclarer pour cette ressource'];
                    return redirect()->back()->withErrors($errors);
                }
            }
        }
        
    }
}
