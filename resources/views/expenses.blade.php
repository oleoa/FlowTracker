@extends('layouts.main')
@section('title', 'Expenses')
@php $current = 'expenses'; @endphp
@section('content')

  <main class="flex xl:p-0 p-4 gap-4">

    <!-- List and Totals -->
    <div class="grid xl:grid-cols-4 gap-4 w-2/3 h-fit">

      <!-- Total -->
      <div class="p-4 rounded bg-secondary-200 border-primary-200 border-2 font-bold flex flex-col gap-2">
        <div class="flex gap-4 items-center">
          <p>Total</p>
          <i class="fa-solid fa-receipt"></i>
        </div>
        <span class="text-2xl">150€</span>
      </div>
  
      <!-- Total Endless Montly -->
      <div class="p-4 rounded bg-secondary-200 border-primary-200 border-2 font-bold flex flex-col gap-2">
        <div class="flex gap-4 items-center">
          <p>Total Endless Montly</p>
          <i class="fa-solid fa-infinity"></i>
        </div>
        <span class="text-2xl">50€</span>
      </div>
  
      <!-- Total Montly -->
      <div class="p-4 rounded bg-secondary-200 border-primary-200 border-2 font-bold flex flex-col gap-2">
        <div class="flex gap-4 items-center">
          <p>Total Montly</p>
          <i class="fa-solid fa-calendar-days"></i>
        </div>
        <span class="text-2xl">75€</span>
      </div>
  
      <!-- Total Odd -->
      <div class="p-4 rounded bg-secondary-200 border-primary-200 border-2 font-bold flex flex-col gap-2">
        <div class="flex gap-4 items-center">
          <p>Total Odd</p>
          <i class="fa-solid fa-receipt"></i>
        </div>
        <span class="text-2xl">25€</span>
      </div>
  
      <!-- Expenses List -->
      <div class="col-span-4 flex flex-col h-min">
  
        <!-- Expense -->
        <div class="bg-secondary-200 rounded w-full p-4 flex justify-between items-center">
          <div>
            <h3>Mc Donalds</h3>
            <h4>Food</h4>
          </div>
          <div class="flex items-center gap-4">
            <div class="flex flex-col">
              <span class="text-base">28/02/2024</span>
              <span class="text-2xl text-end">20€</span>
            </div>
            <i class="fa-solid fa-ellipsis-vertical cursor-pointer text-4xl"></i>
          </div>
        </div>
  
      </div>

    </div>

    <!-- Add Expense -->
    <form action="{{route('expense.add')}}" method="POST" class="flex flex-col gap-2 w-1/3">
      @csrf
  
      <!-- Name -->
      <label for="name">Name</label>
      <input type="text" autocomplete="name" name="name" id="name" class="bg-secondary-200 text-white" placeholder="Mc Donalds">
  
      <!-- amount -->
      <label for="amount">Amount</label>
      <input type="number" name="amount" step="any" id="amount" class="bg-secondary-200 text-white" placeholder="8.75 or 8,75">
  
      <!-- Category -->
      <label for="category">Category</label>
      <select name="category" id="category" class="bg-secondary-200 text-white rounded px-4 border-r-8 border-secondary-200">
        <option value="1">Food</option>
        <option value="2">Transport</option>
        <option value="3">Entertainment</option>
        <option value="4">Health</option>
        <option value="5">Education</option>
        <option value="6">Other</option>
      </select>
  
      <!-- Date -->
      <label for="date">Date</label>
      <input type="date" id="date" name="date" class="bg-secondary-200 text-white rounded" value="{{date('Y-m-d')}}">
  
      <!-- Recurrent -->
      <label for="recurrent">Recurrent?</label>
      <select name="recurrent" id="recurrent" class="bg-secondary-200 text-white rounded px-4 border-r-8 border-secondary-200">
        <option value="false" selected>No</option>
        <option value="true">Yes</option>
      </select>
  
      <!-- End Date -->
      <label for="end_date">End</label>
      <input type="date" id="end_date" name="end_date" class="bg-secondary-200 text-white rounded" value="{{date('Y-m-d')}}">
  
      <!-- Frequency -->
      <label for="frequency">Frequency</label>
      <select name="frequency" id="frequency" class="bg-secondary-200 text-white rounded px-4 border-r-8 border-secondary-200">
        <option value="day">Day</option>
        <option value="week">Week</option>
        <option value="month" selected>Month</option>
        <option value="year">Year</option>
        <option value="quarter">Quarter</option>
        <option value="halfyear">Half Year</option>
        <option value="biennial">Biennial</option>
      </select>
  
      <!-- Submit -->
      <input type="submit" class="bg-green-500 text-white rounded px-4 hover:bg-gradient-to-br hover:from-primary-200 hover:to-primary-300" value="Add">

      <!-- Errors -->
      <x-errors/>
  
    </form>

  </main>

@endsection
