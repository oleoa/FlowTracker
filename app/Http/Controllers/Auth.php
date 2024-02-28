<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
    
  }

  public function signup(Request $request)
  {

  }

  public function signout(Request $request)
  {

  }
}
