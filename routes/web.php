<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RessourcesController;
use App\Http\Controllers\CRessourceController;
use App\Http\Controllers\CreateUserController;
use App\Http\Controllers\CreateTicketController;
use App\Http\Controllers\ListUsersController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

Route::get('/', function (){
    return view('home');
}) ->name('home');

Route::get('/dashboard', [DashboardController::class, 'index']) ->name('dashboard');

Route::get('/listusers', [ListUsersController::class, 'index']) ->name('listusers');
Route::delete('/listusers/{id}', [ListUsersController::class, 'destroy']) ->name('users.destroy');

Route::get('/ressources', [RessourcesController::class, 'index']) ->name('ressources');
Route::delete('/ressources/{id}', [RessourcesController::class, 'destroy']) ->name('ressources.destroy');

Route::get('/createRessource', [CRessourceController::class, 'index']) ->name('createRessource');
Route::post('/createRessource', [CRessourceController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store']) ->name('logout');

Route::get('/login', [LoginController::class, 'index']) ->name('login');
Route::post('/login', [LoginController::class, 'store']);

//Route::get('/register', [RegisterController::class, 'index']) ->name('register');
//Route::post('/register', [RegisterController::class, 'store']);

Route::get('/createuser', [CreateUserController::class, 'index']) ->name('createuser');
Route::post('/createuser', [CreateUserController::class, 'store']);

Route::get('/createticket', [CreateTicketController::class, 'index']) ->name('createticket');





Route::get('/posts', function () {
    return view('posts.index');
});
