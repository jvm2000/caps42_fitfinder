<?php

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\requestController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\MatchmakingController;
use App\Http\Controllers\SendRequestController;
use App\Http\Controllers\ContractDashboardController;
use App\Http\Controllers\MedicalCertificateController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

	Auth::routes(['verify' => true]);
	Route::get('/email/verify', function () {return view('auth.notify');})->middleware('auth')->name('verification.notice');Route::get('/', function () {return view('welcome');})->middleware('guest')->name('welcome');
	//Route::get('/verification', function () {return view('verify');})->name('verify');
	Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();return redirect('/home');})->middleware(['auth', 'signed'])->name('verification.verify');
	Route::post('/email/verification-notification', function (Request $request) {$request->user()->sendEmailVerificationNotification();return redirect('/home')->with('message', 'Verification link sent!');})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

	// Auth
	Route::get('/login', function () {return view('auth/login');})->name('login');
	Route::get('/register', function () {return view('auth/register');});
	Route::post('/auth-register', [AuthController::class, 'store'])->name('user.register');
	Route::post('/auth-login', [AuthController::class, 'login'])->name('user.login');
	Route::post('/verify-login', [AuthController::class, 'verify'])->name('verify.login');
Auth::routes(['verify' => true]);
Route::get('/email/verify', function () {
    return view('auth.notify');
})->middleware('auth')->name('verification.notice');
Route::get('/', function () {return view('welcome');})->middleware('guest')->name('welcome');
//Route::get('/verification', function () {return view('verify');})->name('verify');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return redirect('/home')->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
// Auth
Route::get('/login', function () {return view('auth/login');})->name('login');
Route::get('/register', function () {return view('auth/register');});
Route::post('/auth-register', [AuthController::class, 'store'])->name('user.register');
Route::post('/auth-login', [AuthController::class, 'login'])->name('user.login');
Route::post('/verify-login', [AuthController::class, 'verify'])->name('verify.login');

//	Admin
Route::get('/admin', function () {return view('admin/index');})->name('admin.dashboard');
Route::get('/admin/trainees', [AdminController::class, 'traineesIndex'])->name('admin.trainees');
Route::get('/admin/coaches', [AdminController::class, 'coachesIndex'])->name('admin.coaches');
Route::get('/admin/programs', [AdminController::class, 'programsIndex'])->name('admin.programs');
Route::get('/admin/modules', [AdminController::class, 'modulesIndex'])->name('admin.modules');
Route::get('/admin/contracts', [AdminController::class, 'contractsIndex'])->name('admin.contracts');
Route::put('/admin/suspend/{user}', [AdminController::class, 'suspendUser'])->name('admin.User');
Route::delete('/admin/delete/{user}', [AdminController::class, 'destroy'])->name('admin.destroy');


	Route::middleware(['auth'])->group(function () {
	
	// General 
	Route::get('/request-all', [RequestController::class, 'index'])->name('user.index');
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
	// Route::get('/contracts/dashboard', [ContractController::class, 'showContracts'])->middleware(['auth', 'verified']);
    Route::post('/contracts/contract', [ContractDashboardController::class, 'contract']);
	Route::get('/contracts/dashboard', [ContractDashboardController::class, 'listOfContracts']);
	Route::get('/contracts/make', [ContractController::class, 'index'])->name('generate.contract')->middleware(['auth', 'verified']);
  Route::post('/contracts/create', [ContractController::class, 'store'])->name('contracts.store')->middleware(['auth', 'verified']);
	
	// Matchmake 
	Route::get('/matchmakes', [MatchmakingController::class, 'index'])->name('matchmaking.index');
	
	//viewprofile
	Route::get('/matchmakes/view/{id}', [MatchmakingController::class, 'show'])->name('matchmaking.show');
	
	//SendRequest
	Route::post('/matchmakes/send-request', [MatchmakingController::class, 'sendRequest'])->name('matchmaking.send');
	//payments
	Route::get('/payments/create', [PaymentController::class, 'create'])->name('payments.create')->middleware(['auth', 'verified']);
	Route::post('/payments/store', [PaymentController::class, 'store'])->name('payments.store')->middleware(['auth', 'verified']);
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
	//Payments
	Route::get('payment',[PaymentController::class,'index'])->name('payment.index');
	// Modules 
	Route::get('/programs/show/{program}', [ProgramController::class, 'showProgram'])->name('modules.program.show');
	Route::get('/modules/make/{program}', function (Program $program) {return view('modules.create', compact('program'));})->name('modules.make');
	Route::post('/modules/create/{program}', [ModuleController::class, 'store'])->name('modules.create');
	Route::get('/modules/edit/{module}', [ModuleController::class, 'edit'])->name('modules.edit');
	Route::put('/modules/update/{module}', [ModuleController::class, 'update'])->name('modules.update');
	Route::delete('/modules/delete/{module}', [ModuleController::class, 'destroy'])->name('modules.delete');
		
	// Matchmake 
	Route::get('/matchmakes', [MatchmakingController::class, 'index'])->name('matchmaking.index');
	
	//viewprofile
	Route::get('/matchmakes/view/{id}', [MatchmakingController::class, 'show'])->name('matchmaking.show');
	
	//SendRequest
	Route::post('/matchmakes/send-request', [SendRequestController::class, 'sendRequest'])->name('matchmaking.send');
	//
	Route::get('/coach/dashboard', [SendRequestController::class, 'dashboard'])->name('coach.dashboard');
	Route::post('/coach/approve-payment/{payment}', [SendRequestController::class, 'approvePayment'])->name('coach.approvePayment');
	Route::post('/coach/disapprove-payment/{payment}', [SendRequestController::class, 'disapprovePayment'])->name('coach.disapprovePayment');
//
Route::post('/coach/approve-request/{request}', [UserController::class, 'approveRequest'])->name('coach.approveRequest');
Route::post('/coach/disapprove-request/{request}', [UserController::class, 'disapproveRequest'])->name('coach.disapproveRequest');
	});


	Route::get('logged-in/dashboard', [MatchmakingController::class, 'show'])->name('dashboard.main');
	Route::post('/matchmaking/send-request', [MatchmakingController::class, 'sendRequest'])->name('send.request');
