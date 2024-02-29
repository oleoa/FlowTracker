<?php

namespace App\Helpers;

use App\Helpers\Recurring;
use App\Models\Expense;
use Carbon\Carbon;

class RecurringExpenses extends Recurring
{
  // This function is called when a new recurring expense is created
  public function addRecurredExpense($expense)
  {
    if(!$expense->recurring) return;
    
    $started = Carbon::parse($expense->date);
    $today = date('Y-m-d');

    $enought = false;
    $lastDate = $started;
    while(!$enought)
    {
      $expense->date = $lastDate->addMonth()->toDateString();
      if($expense->date > $today){
        $enought = true;
        break;
      }
      $lastExpense = $this->addExpense($expense);
      $lastDate = Carbon::parse($lastExpense->date);
    }
  }

  private function checkLastRecurredByFrequency($date, $frequency)
  {
    $newDate = $date;
    if($frequency === 'day') return $newDate->addDay();
    if($frequency === 'week') return $newDate->addWeek();
    if($frequency === 'month') return $newDate->addMonth();
    if($frequency === 'year') return $newDate->addYear();
    if($frequency === 'quarter') return $newDate->addMonths(3);
    if($frequency === 'semester') return $newDate->addMonths(6);
    if($frequency === 'biennium') return $newDate->addYears(2);
  }

  private function addRecurringExpense($lastExpense)
  {
    $newDate = Carbon::parse($lastExpense['date']);
    if($lastExpense['frequency'] === 'day') $newDate->addDay();
    if($lastExpense['frequency'] === 'week') $newDate->addWeek();
    if($lastExpense['frequency'] === 'month') $newDate->addMonth();
    if($lastExpense['frequency'] === 'year') $newDate->addYear();
    if($lastExpense['frequency'] === 'quarter') $newDate->addMonths(3);
    if($lastExpense['frequency'] === 'semester') $newDate->addMonths(6);
    if($lastExpense['frequency'] === 'biennium') $newDate->addYears(2);

    $expense = new Expense();
    $expense->user = auth()->id();
    $expense->name = $lastExpense['name'];
    $expense->category = $lastExpense['category'];
    $expense->amount = $lastExpense['amount'];
    $expense->date = $newDate->toDateString();
    $expense->recurring = 0;
    $expense->it_ends = $lastExpense['it_ends'] == 'true';
    $expense->end_date = $lastExpense['end_date'];
    $expense->frequency = $lastExpense['frequency'];
    $expense->expense = $lastExpense['id'];
    $expense->save();
  }

  private function addExpense($expense)
  {
    $newExpense = new Expense();
    $newExpense->user = auth()->id();
    $newExpense->name = $expense['name'];
    $newExpense->category = $expense['category'];
    $newExpense->amount = $expense['amount'];
    $newExpense->date = $expense['date'];
    $newExpense->recurring = 0;
    $newExpense->it_ends = $expense['it_ends'] == 'true';
    $newExpense->end_date = $expense['end_date'];
    $newExpense->frequency = $expense['frequency'];
    $newExpense->primary = 0;
    $newExpense->expense = $expense['id'];
    $newExpense->save();
    return $newExpense;
  }
}
