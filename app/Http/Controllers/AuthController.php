<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
    ]);

    $form['password'] = bcrypt($form['password']);

    $user = User::create($form);

    auth()->login($user);

    return redirect('/login')->with('message', 'User creation successfully!');
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
      return redirect('/logged-in/dashboard')->with('message', 'Logged in successfully!');
    } else {
      return redirect('/login')->with('message', 'Logged in Unsuccessfully!');
    }
    // return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
  }

  /**
   * Display the specified resource.
   */
  public function show(User $user)
  {
    return view(['user' => $user]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
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

    return redirect('/')->with('message','Logged out successfully!');
  }
}
