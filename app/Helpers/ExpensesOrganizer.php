<?php

namespace App\Helpers;

class ExpensesOrganizer
{
  private $categories;
  private $expenses;
  private $range;

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

  private function returns()
  {
    $whatItReturns = array(
      'allExpenses',
      'totalCost',
    );
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
