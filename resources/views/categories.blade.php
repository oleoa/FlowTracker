@extends('layouts.main')
@section('title', 'Categories')
@php $current = 'categories'; @endphp
@section('content')

  <main class="grid xl:grid-cols-4 gap-4 xl:p-0 p-4">

    <!-- Select type -->
    <div class="xl:col-span-4 py-4 flex gap-4 [&>a]:underline">
      <a href="{{route('categories', ['type' => 'expense'])}}" @class([
        'text-primary-100' => $type == 'expense'
      ])>Expense</a>
      <a href="{{route('categories', ['type' => 'income'])}}" @class([
        'text-primary-100' => $type == 'income'
      ])>Income</a>
    </div>

    <!-- Add category -->
    <form action="{{route('category.add')}}" method="post" class="xl:col-span-4 flex gap-4">
      @csrf
      <input type="hidden" name="type" value="{{$type}}">
      <input type="text" name="name" placeholder="Category name">
      <button type="submit" class="submit">Add</button>
    </form>

    <!-- Categories -->
    @foreach($categories as $category)
    
      <div class="p-4 bg-secondary-200 rounded-md flex items-center justify-between">

        <h3>{{$category['name']}}</h3>

        <form action="{{route('category.delete')}}" method="post">
          @csrf @method('delete')
          <input type="hidden" name="id" value="{{$category['id']}}">
          <button type="submit"><i class="fa-solid fa-trash text-primary-200"></i></button>
        </form>

      </div>

    @endforeach

  </main>

@endsection
