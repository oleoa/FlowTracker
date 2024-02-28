@extends('layouts.guest')
@section('title', 'Colors')
@section('content')

  <main class="h-screen w-screen grid grid-cols-3">

    <div class="bg-primary-100">
      <h1 class="w-full text-white text-center py-6">
        bg-primary-100
      </h1>
    </div>

    <div class="bg-primary-200">
      <h1 class="w-full text-white text-center py-6">
        bg-primary-200
      </h1>
    </div>

    <div class="bg-primary-300">
      <h1 class="w-full text-white text-center py-6">
        bg-primary-300
      </h1>
    </div>

    <div class="grid grid-cols-2 col-span-3">

      <div class="bg-secondary-100">
        <h1 class="w-full text-white text-center py-6">
          bg-secondary-100
        </h1>
      </div>
  
      <div class="bg-secondary-200">
        <h1 class="w-full text-white text-center py-6">
          bg-secondary-200
        </h1>
      </div>

    </div>

  </main>

@endsection
