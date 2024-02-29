<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Expense;
use App\Helpers\ExpensesOrganizer;

class Expenses extends Controller
{
  public function index($range = 'month')
  {
    $data['range'] = $range;
    $data['categories'] = Category::where('type', 'expense')->get();
    $data['expenses'] = Expense::where('user', auth()->id())->get();
    $data['total']['all'] = 7;
    $data['total']['recurring'] = 0;
    $data['total']['odd'] = 7;
    $expensesOrganizer = new ExpensesOrganizer();
    $expensesOrganizer->setRange($data['range']);
    $expensesOrganizer->setCategories($data['categories']);
    $expensesOrganizer->setExpenses($data['expenses']);

    return view('expenses', $data);
  }

  public function add(Request $request)
  {
    $validated = $request->validate([
      'name' => 'required|string',
      'amount' => 'required|numeric',
      'category' => 'required|numeric',
      'date' => 'required|date',
      'recurring' => 'required|string|in:true,false',
      'it_ends' => 'required_if:recurring,true|string|in:true,false',
      'end_date' => 'required_if:recurring,true|date',
      'frequency' => 'required_if:recurring,true|string|in:day,week,month,year,quarter,semester,biennium'
    ]);
    
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

    return redirect()->route('expenses');
  }

  public function delete(Request $request)
  {
    $validated = $request->validate([
      'id' => 'required|numeric'
    ]);

    $expense = Expense::find($validated['id']);
    if($expense->user === auth()->id())
      $expense->delete();

    return redirect()->route('expenses');
  }
}
