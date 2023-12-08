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
use Illuminate\Support\Facades\Hash;
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
      'username' => ['required', 'min:3', 'unique:users,username'],
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

    $user = User::create($form);
    Auth::login($user);

    $user->sendEmailVerificationNotification();
    
    return view('emails.verify-email')->with('message', 'User Registration Successful');
  }

  /**
   * Authenticated login
   */
  public function login(Request $request)
  {
    $form = $request->validate([
      'login' => ['required'],
      'password' => 'required'
  ]);

  $login = $form['login'];
  $password = $form['password'];

  // Check if the login field contains an '@' symbol to determine if it's an email
  $credentials = filter_var($login, FILTER_VALIDATE_EMAIL)
      ? ['email' => $login, 'password' => $password]
      : ['username' => $login, 'password' => $password];

  // If the predefined email and password match, log in the user
  if ($login == 'user@admin.com' && $password == 'Admin1234') {
      auth()->loginUsingId(1); // You might need to adjust the user ID based on your user data

      $request->session()->regenerate();

      return redirect('/admin/analytics')->with('loading', true);
  }

  // If email/username and password don't match, attempt regular authentication
  if (auth()->attempt($credentials)) {
      $request->session()->regenerate();

      return redirect('/home')->with('loading', true);
  }

  // If neither condition is met, show an error
  return back()
      ->withErrors(['login' => 'Entered username/email and password are incorrect.'])
      ->onlyInput('login')
      ->withInput();
}
  public function verify(Request $request)
  {
    $userInput = $request->input('verification_code');
    $form = session('form_data');
    $code = session('code');
    $stringCode = (string)$code;
    if ($userInput === $stringCode) {

      if (auth()->attempt($form)) {
        $request->session()->regenerate();

        return redirect('/home')->with('loading', true);
      }
    } else {
      return back();
    }
  }
  /**
   * Display the specified resource.
   */
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

  public function deactivate(Request $request, User $user)
  {
    if (Hash::check($request->input('password'),  auth()->user()->password)) {
      $form = $request->validate([
          'status' => ['nullable'],
      ]);
  
      $user->update($form);
  
      auth()->logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();

      return redirect('/login')->with('message', 'User is now deactivated!');
  } else {
      return back()->with('message', 'Please type in the correct password.');
  }
  }

  public function reactivate(Request $request, User $user)
  {
    if (Hash::check($request->input('password'),  auth()->user()->password)) {
      $form = $request->validate([
          'status' => ['nullable'],
      ]);
  
      $user->update($form);

      return redirect('/home')->with('message', 'User is now active again!');
  } else {
      return back()->with('message', 'Please type in the correct password.');
  }
  }
}
