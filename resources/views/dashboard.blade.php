@extends('layouts.main')
@section('title', 'Home')
@php $current = 'dashboard'; @endphp
@section('content')

  <main class="grid xl:grid-cols-4 xl:grid-rows-7 gap-4 xl:p-0 p-4">

    <!-- Amounts Row -->
    <div class="p-4 rounded bg-secondary-200 border-2 border-primary-100 font-bold flex flex-col gap-2">
      <div class="flex gap-4">
        <p>Current balance</p>
        <i class="fa-solid fa-money-bill"></i>
      </div>
      <span class="text-2xl">150€</span>
    </div>

    <div class="p-4 rounded bg-secondary-200 border-2 border-green-500 font-bold flex flex-col gap-2">
      <div class="flex gap-4">
        <p>Income Montly</p>
        <i class="fa-solid fa-arrow-down"></i>
      </div>
      <span class="text-2xl">300€</span>
    </div>

    <div class="p-4 rounded bg-secondary-200 border-2 border-primary-200 font-bold flex flex-col gap-2">
      <div class="flex gap-4">
        <p>Expense Montly</p>
        <i class="fa-solid fa-arrow-up"></i>
      </div>
      <span class="text-2xl">100€</span>
    </div>

    <!-- Historic Column -->
    <div class="xl:row-span-7 text-white font-bold bg-gradient-to-br from-primary-200 to-primary-300 rounded">

      <!-- Title -->
      <div class="flex gap-4 items-center justify-center border-white border-b-2 py-8">
        <i class="fa-regular fa-calendar"></i>
        <h3>Your Transaction History</h3>
      </div>

      <!-- Historic -->
      <div class="flex flex-col items-center justify-start gap-2 p-2">

        <div class="bg-secondary-100 rounded w-full p-4 flex justify-between items-center">
          <h3>Mc Donalds</h3>
          <div class="flex items-center gap-4">
            <span class="text-xl">20€</span>
            <i class="fa-solid fa-ellipsis-vertical cursor-pointer"></i>
          </div>
        </div>

        <div class="bg-secondary-100 rounded w-full p-4 flex justify-between items-center">
          <h3>H&M</h3>
          <div class="flex items-center gap-4">
            <span class="text-xl">36€</span>
            <i class="fa-solid fa-ellipsis-vertical"></i>
          </div>
        </div>

        <div class="bg-secondary-100 rounded w-full p-4 flex justify-between items-center">
          <h3>Gym</h3>
          <div class="flex items-center gap-4">
            <span class="text-xl">43€</span>
            <i class="fa-solid fa-ellipsis-vertical"></i>
          </div>
        </div>

      </div>

    </div>

  </main>

@endsection
