<?php

namespace App\Helpers;

use Carbon\Carbon;
use App\Models\Expense;
use App\Models\Income;

class Recurring
{
  // This function is called when a new recurring expense or income is created
  public function addRecurreing($transaction, $type)
  {
    if(!$transaction->recurring) return;
    
    $started = Carbon::parse($transaction->date);
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

      $transaction->date = $this->addTheCorrectDateForTheFrequency($lastDateAdded, $transaction->frequency);

      if($transaction->date->toDateString() > $today){
        $enought = true;
        break;
      }

      if($transaction->it_ends){
        if($transaction->date->toDateString() > $transaction->end_date){
          $enought = true;
          break;
        }
      }

      $lastOne = $this->addTransaction($transaction, $type);

      $lastDateAdded = Carbon::parse($lastOne->date);

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

  private function addTransaction($transaction, $type)
  {
    $typeToString = explode('\\', $type)[2];
    if($type != Expense::class && $type != Income::class) return;
    $newTransaction = new $type();
    $newTransaction->user = auth()->id();
    $newTransaction->name = $transaction['name'];
    $newTransaction->category = $transaction['category'];
    $newTransaction->amount = $transaction['amount'];
    $newTransaction->date = $transaction['date'];
    $newTransaction->recurring = 0;
    $newTransaction->it_ends = $transaction['it_ends'] == 'true';
    $newTransaction->end_date = $transaction['end_date'];
    $newTransaction->frequency = $transaction['frequency'];
    $newTransaction->primary = 0;
    $newTransaction->$typeToString = $transaction['id'];
    $newTransaction->save();
    return $newTransaction;
  }
}
