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
Route::post('/auth/profile/update/{user}',[AuthController::class, 'update'])->middleware('auth')->name('user.update');

Route::get('/logged-in/matchmake', function () {
  return view('dashboard/matchmaking');
});
Route::get('/dashboard/matchmaking', [MatchmakingController::class, 'index'])->name('matchmaking.index');

Route::get('logged-in/dashboard', [MatchmakingController::class, 'show'])->name('dashboard/main');
Route::post('/matchmaking/send-request', [MatchmakingController::class, 'sendRequest'])->name('send.request');





