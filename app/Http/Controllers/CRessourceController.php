<?php

namespace App\Http\Controllers;

use App\Models\ressource;
use Illuminate\Http\Request;
use DB;

class CRessourceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        if (auth()->user()->right == 1) {
            return view('Responsable/createRessource');
        } else {
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'localisation' => 'required|max:255',
        ]);


        $ressource = DB::table('ressources')
            ->where('name', '=', $request->name)
            ->where('localisation', '=', $request->localisation)
            ->first();

        if (is_null($ressource)) {
            $id = DB::select("SHOW TABLE STATUS LIKE 'ressources'");
            $next_id = $id[0]->Auto_increment;

            $request->user()->ressources()->create([
                'name' => $request->name,
                'localisation' => $request->localisation,
                'url' => 'http://192.168.76.76/createticket/' . ($next_id),
            ]);
            return back()->with('message', 'Ressource créer avec succès!');
        } else {
            $errors = ['Ressource de même nom existe dans cette localisation'];
            return redirect()->back()->withErrors($errors)->withInput($request->input());
        }
    }
}
