<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\MyPhpMailerMail;
use PHPMailer\PHPMailer\SMTP;
use Illuminate\Validation\Rule;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Notifications\VerifyEmail;

class AuthController extends Controller
{
  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $form = $request->validate([
      'username' => ['required', 'min:3'],  
      'email' => ['required', 'email', Rule::unique('users', 'email')],
      'password' => ['required', 'min:8'],
      'role' => ['required'],
      'first_name' => ['required'],
      'last_name' => ['required'],
      'phone_number' => ['required', 'min:11'],
      'birthdate' => ['required'],
      'gender' => ['required'],
      'birthdate' => ['required'],
      'tags' => ['required'],
    ]);

    $form['password'] = bcrypt($form['password']);

    // $form['birthdate'] = Carbon::parse($form['birthdate'])->format('Y-m-d');

    $user = User::create($form);
    $user->sendEmailVerificationNotification();

    return redirect('/login')->with('message', 'User Registration Successful');
  }

  /**
   * Authenticated login
   */
  public function login(Request $request)
  {
    $form = $request->validate([
      'email' => ['required', 'email'],
      'password' => 'required'
    ]);

    if (auth()->attempt($form)) {
      $request->session()->regenerate();
    

      return redirect('/home')->with('loading', true);
    }

    return back()->withErrors(['email' => 'Entered email and password is incorrect.'])->onlyInput('email')->withInput();
  }

  
  public function show(User $user)
  {
    return view('dashboard.settings', ['user' => $user]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, User $user)
  {
    // Get the currently authenticated user
    $form = $request->validate([
      'first_name' => ['nullable', 'string'],
      'last_name' => ['nullable', 'string'],
      'phone_number' => ['nullable', 'size:11'], // Ensure exactly 11 characters
      'address' => ['nullable'],
      'city' => ['nullable'],
      'province' => ['nullable'],
      'zip_code' => ['nullable'],
      'birthdate' => ['nullable'],
      'gender' => ['nullable'],
      'role' => ['nullable'],
      'tags' => 'nullable',
      'image' => ['nullable', 'image'],
    ]);

    if (request()->has('image')) {
      $imagePath = request()->file('image')->store('profile', 'public');
      $form['image'] = $imagePath;
    }

    // $form['birthdate'] = Carbon::parse($form['birthdate'])->format('Y-m-d');

    // Update the user's fields
    $user->update($form);

    return back()->with('loading', true);
  }

  public function logout(Request $request)
  {
    auth()->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login')->with('message', 'User logged out successfully!');
  }
}
