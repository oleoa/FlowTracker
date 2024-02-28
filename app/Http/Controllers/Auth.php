<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth as AuthSupport;
use Illuminate\Http\Request;
use App\Models\User;

class Auth extends Controller
{
  public function login()
  {
    return view('login');
  }

  public function register()
  {
    return view('register');
  }

  public function signin(Request $request)
  {
    $validated = $request->validate([
      'email' => 'required|email',
      'password' => 'required'
    ]);

    if (AuthSupport::attempt($validated)) {
      $request->session()->regenerate();

      return redirect()->route('home')->with('success', 'User logged in successfully!');
    }

    return back()->withErrors([
      'email' => 'The provided credentials do not match our records.',
    ]);
  }

  public function signup(Request $request)
  {
    $validated = $request->validate([
      'name' => 'required',
      'email' => 'required|email|unique:users',
      'password' => 'required|confirmed'
    ]);

    $validated['password'] = Hash::make($validated['password']);

    $user = User::create($validated);

    AuthSupport::login($user);

    return redirect()->route('home')->with('success', 'User created successfully!');
  }

  public function signout(Request $request)
  {

  }
}
