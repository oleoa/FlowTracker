<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Models\Expense;

class Controller extends BaseController
{
  use AuthorizesRequests, ValidatesRequests;

  public function __construct()
  {
    /**
     * Checks for an repeating expense or income
     * Because of its nature, every request to the server its checked if there is a new repeating expense or income
     * If there is, it will be added to the database in the same table as the non-repeating ones
    */
    $expenses = Expense::where('user', auth()->id())->get();
    
    /*

    $expense = new Expense();
    $expense->user = auth()->id();
    $expense->name = $validated['name'];
    $expense->category = $validated['category'];
    $expense->amount = $validated['amount'];
    $expense->date = $validated['date'];
    $expense->recurring = $validated['recurring'] === 'true';
    $expense->it_ends = $validated['it_ends'] === 'true';
    $expense->end_date = $validated['end_date'];
    $expense->frequency = $validated['frequency'];
    $expense->save();
    */
  }
}
