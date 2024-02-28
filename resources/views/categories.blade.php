@extends('layouts.main')
@section('title', 'Categories')
@php $current = 'categories'; @endphp
@section('content')

  <main class="grid grid-cols-4">

    <!-- Select type -->
    <div class="col-span-4">
      <span>Income</span>
      <span>Expense</span>
    </div>
    
    <h1>Categories</h1>

  </main>

@endsection
