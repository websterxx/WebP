<?php

namespace App\Http\Controllers;

use App\Models\ressource;
use Illuminate\Http\Request;
use DB;
class CRessourceController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index(){
        return view('createRessource');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name'=> 'required|max:255',
            'localisation'=> 'required|max:255',
        ]);

        $id=DB::select("SHOW TABLE STATUS LIKE 'ressources'");
        $next_id= $id[0]->Auto_increment;

        $request->user()->ressources()->create([
            'name' => $request->name,
            'localisation' => $request->localisation,
            'url' => 'http://127.0.0.1:8000/createticket/'.($next_id),
        ]);

        return back();
    }
}
