<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

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
    
    return redirect('/main')->with('message', 'User creation successfully!');
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
      return redirect('/main')->with('loginMessage', 'Logged in successfully!');
    } 
    return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
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

    return back()->with('success', 'User Updated successfully');
}
 


  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }

  public function logout(Request $request) {
    auth()->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login')->with('message','Logged out successfully!');
  }
}
