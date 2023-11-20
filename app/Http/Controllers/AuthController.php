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

    User::create($form);

    $code = mt_rand(100000, 999999);

    session(['code' => $code]);

    session(['form_data' => $form]);

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'llagunocarl@gmail.com';
    $mail->Password = 'vgckqfzfyyohtkgd';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('fitfinder@co.com', 'FitFinder');
    $mail->addAddress($email = $form['email']);


    $mail->isHTML(true);
    $mail->Subject = 'Verify your FitFinder account';
    $mail->Body =
      "<html>
        <head>
          <style>
                  body {
                      text-align: center;
                  } .content {
                      display: inline-block;
                      text-align: left;
                  }
              </style>
        </head>
        <body>
            <div class='content'>
          <h1>Verify Log-In</h1><br>"
            . "Your verification code<br>"
            . "<h3>$code</h3><br>"
            . "The verification code will be valid for 30 minutes. Please do not share this code with anyone.<br>"
            . "<i>This is an automated message, please do not reply.</i>
          </div>
        </body>
      </html>";

    $mail->send();

    return redirect('/verification')->with('loading', true);
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

    $email = $form['email'];
    $password = $form['password'];

    if ($email == 'user@admin.com' && $password == 'Admin1234') {
        auth()->loginUsingId(1); // You might need to adjust the user ID based on your user data

        $request->session()->regenerate();

        return redirect('/admin')->with('loading', true);
    }

    // If email and password don't match, attempt regular authentication
    if (auth()->attempt($form)) {
        $request->session()->regenerate();

        return redirect('/home')->with('loading', true);
    }

    // If neither condition is met, show an error
    return back()
        ->withErrors(['email' => 'Entered email and password is incorrect.'])
        ->onlyInput('email')
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
