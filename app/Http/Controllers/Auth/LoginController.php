<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('login');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!auth()->attempt($request->only('email', 'password'))) {
            $errors = ['Invalid login details'];
            return redirect()->back()->withErrors($errors);
        } else {
            if (auth()->user()->right == 0) {
                return redirect()->route('listusers');
            } else {
                return redirect()->route('ressources');
            }
        }
    }
}
