<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TestController;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\RegisterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::post('/test', [TestController::class, 'showTest'])->name('api.test');

Route::post('/login', [LoginController::class, 'auth'])->name('api.login');
Route::post('/register', [RegisterController::class, 'reg'])->name('api.register');
