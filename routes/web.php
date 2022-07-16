<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\ProfileController;
use \Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'show']);

//Route::middleware('api_token_auth')->get('/profile', [ProfileController::class, 'showData'])->name('profile');
Route::resource('profile', ProfileController::class);

Route::get('/login', [LoginController::class, 'auth'])->name('login');

Route::get('/logout', function(){
    Auth::logout();
    return redirect('/');
})->name('logout');
