@extends('layouts.guest')
@section('title', 'Login')
@section('content')

  <!-- Image -->
  <main class="w-full h-full overflow-hidden flex flex-col items-center justify-center bg-center p-4" style="background-image: url('/img/sign/login.jpg')">

    <!-- Login Blur Form -->
    <form action="{{route('sign.in')}}" method="POST" class="rounded-xl flex flex-col items-center justify-start gap-6 backdrop-blur p-8 xl:w-1/3 w-full border-2 border-white">
      @csrf
  
      <!-- Title -->
      <h1 class="py-4 text-white">Login</h1>

      <!-- Email -->
      <span class="w-full relative">
        <input type="email" name="email" placeholder="Email" class="bg-white/0 border-2 border-white placeholder:text-white text-white">
        <div class="absolute right-0 top-0 h-full px-4 flex items-center">
          <i class="fa-solid fa-envelope"></i>
        </div>
      </span>

      <!-- Password -->
      <span class="w-full relative">
        <input type="password" name="password" placeholder="Password" class="bg-white/0 border-2 border-white placeholder:text-white text-white">
        <div class="absolute right-0 top-0 h-full px-4 flex items-center">
          <i class="fa-solid fa-key"></i>
        </div>
      </span>

      <!-- Remember me and Forgot Password -->
      <div class="grid grid-cols-2 w-full">

        <!-- Remember me -->
        <div class="flex items-center gap-2">

          <input type="checkbox" name="remember" id="remember" class="h-full w-fit">

          <label for="remember" class="text-white select-none">Remember me</label>

        </div>

        <!-- Forgot Password -->
        <div class="w-full flex justify-end">

          <a href="" class="text-white hover:text-white/0 hover:bg-gradient-to-br hover:from-primary-200 hover:to-primary-300 bg-clip-text">Forgot Password?</a>

        </div>

      </div>

      <!-- Submit -->
      <input type="submit" value="Login" class="bg-white text-black font-bold hover:bg-gradient-to-br hover:from-primary-200 hover:to-primary-300 hover:text-white">

      <!-- Errors -->
      <x-errors/>

      <!-- Sign up -->
      <span class="text-white flex gap-1">Don't have an account? <a href="{{route('register')}}" class="hover:text-white/0 hover:bg-gradient-to-br hover:from-primary-200 hover:to-primary-300 bg-clip-text">Sign up</a></span>

    </form>

  </main>

@endsection
