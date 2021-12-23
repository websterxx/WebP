<?php

namespace App\Http\Controllers;

use App\Models\ressource;
use Illuminate\Http\Request;

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

        Ressource::create([
            'name' => $request->name,
            'localisation' => $request->localisation,
        ]);

        return back();
    }
}
