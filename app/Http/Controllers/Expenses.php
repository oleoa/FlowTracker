<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Expenses extends Controller
{
  public function index()
  {
    return view('expenses');
  }

  public function add(Request $request)
  {
    $validated = $request->validate([
      'name' => 'required|string',
      'amount' => 'required|numeric',
      'category' => 'required|string', // 'required|in:food,transport,accommodation,other
      'date' => 'required|date',
      'recurrent' => 'required|string|in:true,false',
      'end_date' => 'required_if:recurrent,true|date',
      'frequency' => 'required_if:recurrent,true|in:day,week,month,year,quarter,semester,biennium'
    ]);
    dd($validated);
  }
}
