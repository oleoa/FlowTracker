@extends('layouts.main')
@section('title', 'Home')
@section('content')

  <main class="grid grid-cols-3 gap-4">

    <!-- Amounts Row -->
    <div class="col-span-2 grid grid-cols-3 gap-4 font-bold">

      <div class="p-4 rounded bg-primary-300">
        <div class="flex gap-4">
          <p>Current balance</p>
          <i class="fa-solid fa-money-bill"></i>
        </div>
        <span class="text-2xl">200€</span>
      </div>

      <div class="p-4 rounded bg-primary-100">
        <div class="flex gap-4">
          <p>Income Montly</p>
          <i class="fa-solid fa-arrow-down"></i>
        </div>
        <span class="text-2xl">300€</span>
      </div>

      <div class="p-4 rounded bg-primary-200">
        <div class="flex gap-4">
          <p>Expense Montly</p>
          <i class="fa-solid fa-arrow-up"></i>
        </div>
        <span class="text-2xl">100€</span>
      </div>

    </div>

    <!-- Historic Column -->
    <div class="row-span-2">
      
    </div>

  </main>

@endsection
