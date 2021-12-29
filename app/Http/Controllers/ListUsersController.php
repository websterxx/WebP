<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DB;

class ListUsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $users = User::get();

        if (auth()->user()->right == 0) {
            return view('ADMIN/listusers', [
                'users' => $users
            ]);
        } else {
            return redirect()->back();
        }

    }

    public function destroy($id)
    {
        DB::delete('DELETE FROM users WHERE id= ?', [$id]);
        return back();
    }
}
