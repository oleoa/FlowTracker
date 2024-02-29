<?php

namespace App\Helpers;

use Carbon\Carbon;

class ExpensesFormater
{
  private $categories;
  private $expenses;
  private $range;
  private $response;

  public function setRange($range)
  {
    $this->range = $range;
  }

  public function setCategories($categories)
  {
    $this->categories = $categories;
  }

  public function setExpenses($expenses)
  {
    $this->expenses = $expenses;
  }

  public function get()
  {
    // Remove all that is not in the range
    foreach($this->expenses as $key => $expense)
      if($this->isNotInRange($expense))
        unset($this->expenses[$key]);
    
    // Sets the category names in each one
    $this->response['expenses'] = $this->nameCategoryInExpense($this->expenses, $this->categories);

    // Calculate the totals
    $this->response['total'] = array();
    $this->response['total']['all'] = $this->calculateTotal($this->response['expenses']);
    $this->response['total']['recurring'] = $this->calculateTotal($this->response['expenses'], true);
    $this->response['total']['odd'] = $this->calculateTotal($this->response['expenses'], false);

    $this->response['range'] = $this->range;
    $this->response['categories'] = $this->categories;

    return $this->response;
  }

  private function calculateTotal($expenses, $recurring = null)
  {
    if($recurring === null)
    {
      $sum = 0;
      foreach($expenses as $expense)
        $sum += $expense->amount;
      return $sum;
    }
    if($recurring === true)
    {
      $sum = 0;
      foreach($expenses as $expense)
        if($expense->recurring || !$expense->primary)
          $sum += $expense->amount;
      return $sum;
    }
    if($recurring === false)
    {
      $sum = 0;
      foreach($expenses as $expense)
        if(!$expense->recurring && $expense->primary)
          $sum += $expense->amount;
      return $sum;
    }
  }

  private function isNotInRange($expense)
  {
    $now = Carbon::now();
    $date = Carbon::parse($expense->date);
    if($this->range === 'all') return false;
    if($this->range === 'day') return !$date->isToday();
    if($this->range === 'week') return !$date->isCurrentWeek();
    if($this->range === 'month') return !$date->isCurrentMonth();
    if($this->range === 'year') return !$date->isCurrentYear();
    if($this->range === 'quarter') return !$date->quarter === Carbon::now()->quarter;
    if($this->range === 'semester')
    {
      $currentMonth = Carbon::now()->month;
      return !($currentMonth >= 1 && $currentMonth <= 6 && $date->month >= 1 && $date->month <= 6) || ($currentMonth >= 7 && $currentMonth <= 12 && $date->month >= 7 && $date->month <= 12);
    }
    if($this->range === 'biennium')
    {
      $currentYear = Carbon::now()->year;
      return !($currentYear === $date->year) || ($currentYear - 1 === $date->year);
    }
  }

  private function nameCategoryInExpense($modelExpenses, $modelCategories)
  {
    $namedExpenses = $modelExpenses;
    foreach ($namedExpenses as $expense) {
      $expense->category = $modelCategories->find($expense->category)->name;
    }
    return $namedExpenses;
  }
}
