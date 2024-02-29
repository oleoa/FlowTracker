@extends('layouts.main')
@section('title', 'Expenses')
@php $current = 'expenses'; @endphp
@section('content')

  <main class="grid grid-cols-3 xl:p-0 p-4 gap-4">

    <!-- Range -->
    <div class="xl:col-span-3 flex gap-4">
      <a @class([
        'bg-secondary-200 px-4 py-2 rounded hover:text-white hover-gradient-red-purple',
        'gradient-blue-purple' => $range === 'day'
      ]) href="{{route('expenses', ['range' => 'day'])}}">Day</a>
      <a @class([
        'bg-secondary-200 px-4 py-2 rounded hover:text-white hover-gradient-red-purple',
        'gradient-blue-purple' => $range === 'month'
      ]) href="{{route('expenses', ['range' => 'month'])}}">Month</a>
      <a @class([
        'bg-secondary-200 px-4 py-2 rounded hover:text-white hover-gradient-red-purple',
        'gradient-blue-purple' => $range === 'year'
      ]) href="{{route('expenses', ['range' => 'year'])}}">Year</a>
    </div>

    <!-- List and Totals -->
    <div class="grid xl:grid-cols-3 gap-4 col-span-2 h-fit">

      <!-- Total -->
      <div class="p-4 rounded bg-secondary-200 border-primary-200 border-2 font-bold flex flex-col gap-2">
        <div class="flex gap-4 items-center">
          <p>Total</p>
          <i class="fa-solid fa-receipt"></i>
        </div>
        <span class="text-2xl">{{$total['all']}}€</span>
      </div>
  
      <!-- Total Recurring -->
      <div class="p-4 rounded bg-secondary-200 border-primary-200 border-2 font-bold flex flex-col gap-2">
        <div class="flex gap-4 items-center">
          <p>Total Recurring</p>
          <i class="fa-solid fa-calendar-days"></i>
        </div>
        <span class="text-2xl">{{$total['recurring']}}€</span>
      </div>
  
      <!-- Total Odd -->
      <div class="p-4 rounded bg-secondary-200 border-primary-200 border-2 font-bold flex flex-col gap-2">
        <div class="flex gap-4 items-center">
          <p>Total Odd</p>
          <i class="fa-solid fa-receipt"></i>
        </div>
        <span class="text-2xl">{{$total['odd']}}€</span>
      </div>
  
      <!-- Expenses List -->
      <div class="col-span-3 flex flex-col h-min gap-4">
  
        @foreach($expenses as $expense)
      
          <!-- Expense -->
          <div class="bg-secondary-200 rounded w-full p-4 flex justify-between items-center">
            <div>
              <h3>{{$expense['name']}}</h3>
              <h4>{{$expense['category']}}</h4>
            </div>
            <div class="flex items-center gap-4">
              <div class="flex flex-col">
                <span class="text-base">{{$expense['date']}}</span>
                <span class="text-2xl text-end">{{$expense['amount']}}€</span>
              </div>
              <form action="{{route('expense.delete')}}" method="post">
                @csrf @method('DELETE')
                <input type="hidden" name="id" value="{{$expense['id']}}">
                <button type="submit" class="p-4"><i class="fa-solid fa-trash text-primary-200"></i></button>
              </form>
            </div>
          </div>

        @endforeach

  
      </div>

    </div>

    <!-- Add Expense -->
    <form action="{{route('expense.add')}}" method="POST" class="flex flex-col gap-2 gradient-red-purple p-4 rounded">
      @csrf
  
      <!-- Name -->
      <label for="name" class="font-black">Name</label>
      <input type="text" autocomplete="name" name="name" id="name" class="bg-secondary-200 text-white" placeholder="Mc Donalds">
  
      <!-- amount -->
      <label for="amount" class="font-black">Amount</label>
      <input type="number" name="amount" step="any" id="amount" class="bg-secondary-200 text-white" placeholder="8.75 or 8,75">
  
      <!-- Category -->
      <label for="category" class="font-black">Category</label>
      <select name="category" id="category" class="bg-secondary-200 rounded px-4 border-r-8 border-secondary-200">
        @foreach($categories as $category)
          <option value="{{$category['id']}}">{{$category['name']}}</option>
        @endforeach
      </select>
  
      <!-- Date -->
      <label for="date" class="font-black">Date</label>
      <input type="date" id="date" name="date" class="bg-secondary-200 rounded" value="{{date('Y-m-d')}}">
  
      <!-- Recurring -->
      <label for="recurring" class="font-black">Recurrent?</label>
      <select name="recurring" id="recurring" class="bg-secondary-200 text-white rounded px-4 border-r-8 border-secondary-200">
        <option value="false" selected>No</option>
        <option value="true">Yes</option>
      </select>

      <!-- Frequency -->
      <div id="frequency_div" class="hidden flex-col gap-2">
        <label for="frequency" class="font-black">Frequency</label>
        <select name="frequency" id="frequency" class="bg-secondary-200 text-white rounded px-4 border-r-8 border-secondary-200">
          <option value="day">Day</option>
          <option value="week">Week</option>
          <option value="month" selected>Month</option>
          <option value="year">Year</option>
          <option value="quarter">Quarter</option>
          <option value="halfyear">Half Year</option>
          <option value="biennial">Biennial</option>
        </select>
      </div>

      <!-- It Ends -->
      <div id="it_ends_div" class="hidden flex-col gap-2">
        <label for="it_ends" class="font-black">It Ends?</label>
        <select name="it_ends" id="it_ends" class="bg-secondary-200 text-white rounded px-4 border-r-8 border-secondary-200">
          <option value="false" selected>No</option>
          <option value="true">Yes</option>
        </select>
      </div>
  
      <!-- End Date -->
      <div id="end_date_div" class="hidden flex-col gap-2">
        <label for="end_date" class="font-black">End</label>
        <input type="date" id="end_date" name="end_date" class="bg-secondary-200 text-white rounded" value="{{date('Y-m-d')}}">
      </div>
  
      <!-- Submit -->
      <input type="submit" class="bg-green-500 text-white rounded px-4 hover:bg-green-400" value="Add">

      <!-- Errors -->
      <x-errors/>
  
    </form>

  </main>

@endsection
