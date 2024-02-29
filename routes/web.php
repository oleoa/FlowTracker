<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Home;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Expenses;
use App\Http\Controllers\Incomes;
use App\Http\Controllers\Categories;
use App\Http\Controllers\Settings;
use App\Http\Controllers\Goals;

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

Route::get('/colors', function () {

  return view('colors');

})->name('colors');

Route::get('/home', [Home::class, 'index'])->name('home');

Route::get('/login', [Auth::class, 'login'])->name('login');

Route::get('/register', [Auth::class, 'register'])->name('register');

Route::name('sign.')->group(function () {

  Route::post('/login', [Auth::class, 'signin'])->name('in');

  Route::post('/register', [Auth::class, 'signup'])->name('up');

  Route::get('/logout', [Auth::class, 'signout'])->name('out');

});

Route::middleware('auth')->group(function () {

  Route::get('/', [Dashboard::class, 'index'])->name('dashboard');

  Route::get('/incomes', [Incomes::class, 'index'])->name('incomes');
  
  Route::get('/expenses', [Expenses::class, 'index'])->name('expenses');
  
  Route::post('/expenses', [Expenses::class, 'add'])->name('expense.add');
  
  Route::delete('/expenses', [Expenses::class, 'delete'])->name('expense.delete');
  
  Route::get('/categories/{type?}', [Categories::class, 'index'])->name('categories');
  
  Route::post('/categories', [Categories::class, 'add'])->name('category.add');
  
  Route::delete('/categories', [Categories::class, 'delete'])->name('category.delete');

  Route::get('/goals', [Goals::class, 'index'])->name('goals');

});
