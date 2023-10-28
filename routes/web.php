<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MatchmakingController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {return view('welcome');});
Route::get('/logged-in/dashboard', function () {return view('dashboard/main');});

// Auth
Route::get('/login', function () {return view('auth/login');});
Route::get('/register', function () {return view('auth/register');});
Route::post('/auth-register', [AuthController::class, 'store'])->name('user.register');
Route::post('/auth-login', [AuthController::class, 'login'])->name('user.login');
Route::post('/auth-logout', [AuthController::class, 'logout'])->middleware('auth')->name('user.logout');
Route::get('/auth/profile/{user}',[AuthController::class, 'show'])->middleware('auth')->name('user.show');

Route::get('/logged-in/matchmake', function () {
  return view('dashboard/matchmaking');
});
Route::get('/matchmaking', [MatchmakingController::class, 'index'])->name('matchmaking.index');

Route::get('/matchmaking/result', [MatchmakingController::class, 'show'])->name('matchmaking.result');
Route::post('/matchmaking/send-request', [MatchmakingController::class, 'sendRequest'])->name('send.request');





