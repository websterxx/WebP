<?php

namespace App\Http\Controllers;

use App\Models\user;
use Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class CreateUserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        if (auth()->user()->right == 0) {
            return view('Admin/createuser');
        } else {
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        // validation
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
        ]);
        // store user
        $user = User::find($request->email);
        if ($user == null) {
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
        } else {
            $errors = ['Veuillez choisir un autre email !'];
            $name = $request->name;
            $email = $request->email;
            $username = $request->username;
            return redirect()->back()->withErrors($errors)->with($name, $email, $username);
        }
    }
}
