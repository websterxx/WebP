<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anomalie;

class CreateAnomalieController extends Controller
{
    public function index()
    {

        return view('ADMIN/createanomalie');
    }

    public function store(Request $request)
    {
        // validation
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
        // store anomalie
        Anomalie::create([
            'name' => $request->name,
        ]);

        // redirect 
        return redirect()->back();
    }
}
