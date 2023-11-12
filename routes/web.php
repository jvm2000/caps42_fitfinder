<?php

use App\Models\Program;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\MatchmakingController;
use App\Http\Controllers\MedicalCertificateController;

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
Route::get('/verification', function () {return view('verify');})->name('verify');

// Auth
Route::get('/login', function () {return view('auth/login');})->name('login');
Route::get('/register', function () {return view('auth/register');});
Route::post('/auth-register', [AuthController::class, 'store'])->name('user.register');
Route::post('/auth-login', [AuthController::class, 'login'])->name('user.login');
Route::post('/verify-login', [AuthController::class, 'verify'])->name('verify.login');

Route::middleware(['auth'])->group(function () {
	// General 
	Route::get('/home', function () {return view('dashboard/main');})->name('home.index');
	Route::post('/auth-logout', [AuthController::class, 'logout'])->name('user.logout');
	Route::get('/auth/profile/{user}', [AuthController::class, 'show'])->name('user.show');
	Route::put('/auth/profile/update/{user}', [AuthController::class, 'update'])->name('user.update');
	// General 
	Route::get('/home', function () {return view('dashboard/main');})->name('home.index');
	Route::post('/auth-logout', [AuthController::class, 'logout'])->name('user.logout');
	Route::get('/auth/profile/{user}', [AuthController::class, 'show'])->name('user.show');
	Route::put('/auth/profile/update/{user}', [AuthController::class, 'update'])->name('user.update');

	//Portfolio Creation
	Route::get('/profile/coach/{user}', [PortfolioController::class, 'index'])->name('profile.index');
	Route::post('/portfolio/create/{user}', [PortfolioController::class, 'store'])->name('portfolio.create');
	Route::put('/portfolio/update/{portfolio}', [PortfolioController::class, 'update'])->name('portfolio.update');

	//Medcerts
	Route::get('/profile/trainee/{user}', [MedicalCertificateController::class, 'index'])->name('medcert.index');
	Route::post('/medcert/create/{user}', [MedicalCertificateController::class, 'store'])->name('medcert.create');
	Route::put('/medcert/update/{medcert}', [MedicalCertificateController::class, 'update'])->name('medcert.update');
	//contracts
	Route::get('/contracts', [ContractController::class, 'index'])->name('contracts.index');
	Route::post('/contracts/make', [ContractController::class, 'generateContract'])->name('generate.contract');
  Route::post('/contracts/send', [ContractController::class, 'store']);
	// Matchmake 
	Route::get('/matchmakes', [MatchmakingController::class, 'index'])->name('matchmaking.index');
	//viewprofile
	Route::get('/matchmakes/view/{id}', [MatchmakingController::class, 'show'])->name('matchmaking.show');
	//SendRequest
	Route::post('/matchmakes/send-request', [MatchmakingController::class, 'sendRequest'])->name('matchmaking.send');
	
	//Programs
	Route::get('/programs/make', [ProgramController::class, 'showAllPrograms'])->name('programs.index');
	Route::get('/programs/list', [ProgramController::class, 'index'])->name('programs.index');
	Route::post('/programs/create/{user}', [ProgramController::class, 'store'])->name('programs.create');
	Route::get('/programs/edit/{program}', [ProgramController::class, 'show'])->name('programs.edit');
	Route::put('/programs/archive/{program}', [ProgramController::class, 'archive'])->name('programs.archive');
	Route::put('/programs/restore/{program}', [ProgramController::class, 'restore'])->name('programs.restore');
	Route::put('/programs/update/{program}', [ProgramController::class, 'update'])->name('programs.update');
	Route::delete('/programs/delete/{program}', [ProgramController::class, 'destroy'])->name('programs.delete');

	//Medcerts
	Route::get('/profile/trainee/{user}', [MedicalCertificateController::class, 'index'])->name('medcert.index');
	Route::post('/medcert/create/{user}', [MedicalCertificateController::class, 'store'])->name('medcert.create');
	Route::put('/medcert/update/{medcert}', [MedicalCertificateController::class, 'update'])->name('medcert.update');

	// Modules 
	Route::get('/programs/show/{program}', [ProgramController::class, 'showProgram'])->name('modules.program.show');
	Route::get('/modules/make/{program}', function (Program $program) {
    return view('modules.create', compact('program'));
})->name('modules.make');
	Route::post('/modules/create/{program}', [ModuleController::class, 'store'])->name('modules.create');
	Route::get('/modules/edit/{module}', [ModuleController::class, 'edit'])->name('modules.edit');
	Route::put('/modules/update/{module}', [ModuleController::class, 'update'])->name('modules.update');
	Route::delete('/modules/delete/{module}', [ModuleController::class, 'destroy'])->name('modules.delete');

	// Matchmake 
	Route::get('/matchmakes', [MatchmakingController::class, 'index'])->name('matchmaking.index');
	//viewprofile
	Route::get('/matchmakes/view/{id}', [MatchmakingController::class, 'show'])->name('matchmaking.show');
	//SendRequest
	Route::post('/matchmakes/send-request', [MatchmakingController::class, 'sendRequest'])->name('matchmaking.send');
});


Route::get('logged-in/dashboard', [MatchmakingController::class, 'show'])->name('dashboard.main');
Route::post('/matchmaking/send-request', [MatchmakingController::class, 'sendRequest'])->name('send.request');
