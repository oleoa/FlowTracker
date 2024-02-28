<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
  public function index()
  {
    return view('dashboard');
  }

  public function incomes()
  {
    return view('incomes');
  }

  public function expenses()
  {
    return view('expenses');
  }
}
