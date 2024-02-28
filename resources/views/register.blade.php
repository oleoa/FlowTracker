@extends('layouts.guest')
@section('title', 'Login')
@section('content')

  <!-- Background -->
  <main class="bg-gradient-to-br from-primary-100 to-primary-300 w-full h-full flex flex-col items-center justify-center">

    <!-- Image -->
    <div class="w-11/12 h-5/6 flex flex-col items-center justify-center rounded-xl bg-center" style="background-image: url('/img/sign/5.jpg')">

      <!-- Login Blur Form -->
      <form action="{{route('sign.up')}}" method="POST" class="rounded-xl flex flex-col items-center justify-start gap-6 backdrop-blur p-8 w-1/3 border-2 border-white">
        @csrf
    
        <!-- Title -->
        <h1 class="py-4">Register</h1>

        <!-- Name -->
        <input type="text" name="name" placeholder="Name" class="bg-white/0 border-2 border-white placeholder:text-white text-white focus:outline-none">

        <!-- Email -->
        <input type="email" name="email" placeholder="Email" class="bg-white/0 border-2 border-white placeholder:text-white text-white focus:outline-none">

        <!-- Password -->
        <input type="password" name="password" placeholder="Password" class="bg-white/0 border-2 border-white placeholder:text-white text-white focus:outline-none">

        <!-- Confirm Password -->
        <input type="password" name="password_confirmation" placeholder="Confirm Password" class="bg-white/0 border-2 border-white placeholder:text-white text-white focus:outline-none">

        <!-- Submit -->
        <input type="submit" value="Register" class="bg-white font-bold hover:bg-gradient-to-br hover:from-primary-200 hover:to-primary-300 hover:text-white">

        <!-- Sign up -->
        <span class="text-white">Have an account? <a href="{{route('login')}}" class="hover:text-white/0 hover:bg-gradient-to-br hover:from-primary-200 hover:to-primary-300 bg-clip-text">Sign in</a></span>

      </form>

    </div>

  </main>

@endsection