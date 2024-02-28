<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Expenses extends Controller
{
  public function expenses()
  {
    return view('expenses');
  }

  public function create()
  {
    return view('addexpense');
  }
}
