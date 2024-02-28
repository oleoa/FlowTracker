<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth;
use App\Http\Controllers\Home;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Auth Routes
Route::middleware('auth')->group(function () {
  Route::get('/', [Home::class, 'index'])->name('home');
  Route::get('/logout', [Auth::class, 'logout'])->name('logout');
});

// No Auth Routes
Route::get('/colors', function () {
  return view('colors');
})->name('colors');
Route::get('/login', [Auth::class, 'login'])->name('login');
Route::get('/register', [Auth::class, 'register'])->name('register');
Route::name('sign.')->group(function () {
  Route::post('/login', [Auth::class, 'signin'])->name('in');
  Route::post('/register', [Auth::class, 'signup'])->name('up');
  Route::get('/logout', [Auth::class, 'logout'])->name('out');
});
