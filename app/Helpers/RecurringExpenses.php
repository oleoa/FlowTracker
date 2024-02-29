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
    $today = Carbon::now()->format('Y-m-d');

    /**
     * Here, it's gonna loop
     * Every time it's gonna get the last added expense and add the frequency amount of time to it
     * If it passes the current day, breaks the loop and ends it
     * IF it doesn't, add a new (not primary) expense for the frequenced date
     * And for last it saves the new last date for the next loop
     */
    $enought = false;
    $lastDateAdded = $started;
    while(!$enought)
    {

      $expense->date = $this->addTheCorrectDateForTheFrequency($lastDateAdded, $expense->frequency);

      if($expense->date->toDateString() > $today){
        $enought = true;
        break;
      }

      if($expense->it_ends){
        if($expense->date->toDateString() > $expense->end_date){
          $enought = true;
          break;
        }
      }

      $lastExpense = $this->addExpense($expense);

      $lastDateAdded = Carbon::parse($lastExpense->date);

    }
  }

  private function addTheCorrectDateForTheFrequency($date, $frequency)
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
