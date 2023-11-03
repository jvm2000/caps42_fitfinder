<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\PortfolioController;
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

Route::get('/', function () {return view('welcome');})->middleware('guest')->name('welcome');

// Auth
Route::get('/login', function () {return view('auth/login');})->name('login');
Route::get('/register', function () {return view('auth/register');});
Route::post('/auth-register', [AuthController::class, 'store'])->name('user.register');
Route::post('/auth-login', [AuthController::class, 'login'])->name('user.login');

Route::middleware(['auth'])->group(function () {
  // General 
  Route::post('/auth-logout', [AuthController::class, 'logout'])->name('user.logout');
  Route::get('/auth/profile/{user}',[AuthController::class, 'show'])->name('user.show');
  Route::put('/auth/profile/update/{user}',[AuthController::class, 'update'])->name('user.update');

  //Portfolio Creation
  Route::get('/profile/{user}',[PortfolioController::class, 'index'])->name('profile.index');
  Route::post('/portfolio/create/{user}', [PortfolioController::class, 'store'])->name('portfolio.create');
  Route::put('/portfolio/update/{portfolio}', [PortfolioController::class, 'update'])->name('portfolio.update');

   //Programs
   Route::get('/programs/make', function () {return view('programs/create');})->name('programs.make');
   Route::get('/programs/list', [ProgramController::class, 'index'])->name('programs.index');
   Route::post('/programs/create/{user}', [ProgramController::class, 'store'])->name('programs.create');
   
  // Matchmake 
  Route::get('/main', [MatchmakingController::class, 'index'])->name('matchmaking.index');
  //viewprofile
  Route::get('/viewprofile/{id}', [MatchmakingController::class, 'show'])->name('viewprofile');
   //SendRequest
  Route::post('/send-request', [MatchmakingController::class, 'sendRequest'])->name('sendRequest');
  
});


Route::get('logged-in/dashboard', [MatchmakingController::class, 'show'])->name('dashboard.main');
Route::post('/matchmaking/send-request', [MatchmakingController::class, 'sendRequest'])->name('send.request');





