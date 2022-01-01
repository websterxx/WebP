<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RessourcesController;
use App\Http\Controllers\CRessourceController;
use App\Http\Controllers\CreateUserController;
use App\Http\Controllers\CreateTicketController;
use App\Http\Controllers\ListUsersController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\SimpleQRcodeController;
use Illuminate\Support\Facades\Auth;



Route::get('/', function () {
    if (Auth::check()) {
        if (auth()->user()->right == 0) {
            return redirect()->route('listusers');
        } else {
            return redirect()->route('ressources');
        }
    }
    return view('login');
})->name('home');

Route::get('/listusers', [ListUsersController::class, 'index'])->name('listusers');
Route::delete('/listusers/{id}', [ListUsersController::class, 'destroy'])->name('users.destroy');

Route::get('/createuser', [CreateUserController::class, 'index'])->name('createuser');
Route::post('/createuser', [CreateUserController::class, 'store']);


// RESPONSABLE

Route::get('/ressources', [RessourcesController::class, 'index'])->name('ressources');
Route::delete('/ressources/{id}', [RessourcesController::class, 'destroy'])->name('ressources.destroy');

Route::get('/createRessource', [CRessourceController::class, 'index'])->name('createRessource');
Route::post('/createRessource', [CRessourceController::class, 'store']);

Route::get('/missions', [DashboardController::class, 'index'])->name('missions');
Route::delete('/missions/{id}', [DashboardController::class, 'destroy'])->name('missions.destroy');


// GENERALE

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');
Route::get(
    '/logout',
    function () {
        return back();
    }
);


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/createticket/{ressource:id}', [CreateTicketController::class, 'index'])->name('createticket');
Route::post('/createticket/{ressource:id}', [CreateTicketController::class, 'store']);

Route::get("/simple-qrcode/{id}", [SimpleQRcodeController::class, 'generate'])->name('qrcode.generate');
