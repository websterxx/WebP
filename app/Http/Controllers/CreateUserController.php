<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateUserController extends Controller
{
    public function index(){
        return view('createuser');
    }

    public function store(Request $request){
        // validation
        $this->validate($request, [
            'name'=> 'required|max:255',
            'username'=> 'required|max:255',
            'email'=> 'required|email|max:255',
            'password'=> 'required|confirmed',
        ]);
        // store user
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'right' => 1,
        ]);

        // redirect 
        return redirect()->back();
    }

}
