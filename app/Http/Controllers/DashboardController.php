<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
            if (auth()->user()->right == 1) {
                $tickets = DB::table('tickets')
                ->join('users', 'tickets.user_id', '=', 'users.id')
                ->where('tickets.user_id', '=',  auth()->id())
                ->join('anomalies', 'tickets.anomalie_id', '=', 'anomalies.id')
                ->join('ressources', 'tickets.ressource_id', '=', 'ressources.id')
                ->select('tickets.id', 'anomalies.name as anomalieName', 'ressources.name as ressourceName', 'ressources.localisation', 'tickets.description')
                ->get();

                return view('Responsable/missions', [
                    'tickets' => $tickets
                ]);
            } else {
                return redirect()->back();
            }

        
    }

    public function destroy($id)
    {
        DB::delete('DELETE FROM tickets WHERE id= ?', [$id]);
        return back();
    }
}
