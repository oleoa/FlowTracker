@extends('layouts.main')
@section('title', 'Categories')
@php $current = 'categories'; @endphp
@section('content')

  <main class="grid xl:grid-cols-4">

    <!-- Select type -->
    <div class="xl:col-span-4">
      <span>Income</span>
      <span>Expense</span>
    </div>
    
    <h1>Categories</h1>

  </main>

@endsection
