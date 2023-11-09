<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Mail\MyPhpMailerMail;
use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
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
      'role'=>['required'],
      'first_name'=>['required'],
      'last_name'=>['required'],
      'phone_number'=>['required', 'min:11'],
      'gender'=>['required'],
      'birthdate'=>['required'],
      'tags'=>['required'],
    ]);

    $form['password'] = bcrypt($form['password']);

    $user = User::create($form);

    auth()->login($user);
    
    return redirect('/main')->with('message', 'User Registered successfully!');
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

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'llagunocarl@gmail.com'; 
    $mail->Password = 'vgckqfzfyyohtkgd'; 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;


    $mail->setFrom('llagunocarl@gmail.com', 'FitFinder');
    $mail->addAddress('cllaguno@ace1it.com'); 
	
 
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
			<h1>Register Verification</h1><br>"
			."Your verification code<br>"
			."<h3>12345</h3><br>"
			."The verification code will be valid for 30 minutes. Please do not share this code with anyone.<br>"
			."Thank you for your registration at FitFinder<br><br>"
			."<i>This is an automated message, please do not reply.</i>
			</div>
	   </body>
	</html>";

    
    $mail->send();

      return redirect('/verification')->with('loading', true);
    } 
    
    return back()->withErrors(['email' => 'Entered email and password is incorrect.'])->onlyInput('email')->withInput();
  }
  public function verify(Request $request)
{
    $userInput = $request->input('verification_code'); 

    if ($userInput === '12345' ) {
        // Code matches, redirect to a success view.
        return redirect('/main')->with('loading', true);
    } else {
        // Code does not match, redirect to an error view.
        return back();
    }
}
  /**
   * Display the specified resource.
   */
  public function show(User $user)
  {
    return view('dashboard.settings',['user' => $user]);
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
        'birthdate' => 'nullable',
        'gender' => ['nullable'],
        'role' => ['nullable'],
        'tags' => 'nullable',
        'image' => ['nullable', 'image'],
    ]);

    if(request()->has('image')){
      $imagePath = request()->file('image')->store('profile','public');
      $form['image'] = $imagePath;
    }
    
    // Update the user's fields
    $user->update($form);

    return back()->with('message', 'User updated successfully');
}

  public function logout(Request $request) {
    auth()->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login')->with('message','User logged out successfully!');
  }
}
