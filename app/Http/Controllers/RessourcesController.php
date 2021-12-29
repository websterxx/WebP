<?php

namespace App\Http\Controllers;

use App\Models\Ressource;
use Illuminate\Http\Request;
use DB;

class RessourcesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {

        if (auth()->user()->right == 1) {
            $ressources = Ressource::where('user_id', auth()->user()->id)->get();
            //$ressources = Ressource::get();
            return view('Responsable/listeressources', [
                'ressources' => $ressources
            ]);
        } else {
            return redirect()->back();
        }
       
    }

    public function destroy($id)
    {
        DB::delete('DELETE FROM ressources WHERE id= ?', [$id]);
        return back();
    }
}
