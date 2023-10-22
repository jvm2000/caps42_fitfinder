<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
Route::get('/logged-in/settings', function () {return view('dashboard/settings');});

// Auth
Route::get('/login', function () {return view('auth/login');});
Route::get('/register', function () {return view('auth/register');});
Route::post('/auth-register', [AuthController::class, 'store'])->name('user.register');
Route::post('/auth-login', [AuthController::class, 'login'])->name('user.login');
Route::post('/auth-logout', [AuthController::class, 'logout'])->middleware('auth')->name('user.logout');
Route::get('/auth/profile/{user}',[AuthController::class, 'show'])->middleware('auth')->name('user.show');



