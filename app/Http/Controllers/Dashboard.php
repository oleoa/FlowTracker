<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Income;

class Dashboard extends Controller
{
  public function index()
  {
    $data = array();
    $data['expenses'] = Expense::where('user', auth()->user()->id)->get();
    $data['incomes'] = Income::where('user', auth()->user()->id)->get();
    return view('dashboard', $data);
  }
}
