<?php

namespace App\Http\Controllers;

use App\Models\user;
use Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Symfony\Component\Console\Input\Input;

use DB;


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

        $user = DB::table('users')
        ->where('email', '=', $request->email)
        ->first();


        if (is_null($user)) {
            // It does not exist
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
            // It exists 
            $errors = ['Veuillez choisir un autre email !'];
            $name = $request->name;
            $email = $request->email;
            $username = $request->username;
            
            //$request->input()
            return redirect()->back()->withErrors($errors)->withInput($request->input());
        }


    }
}
