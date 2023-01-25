<?php

use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// this is to check for the IP visiting over 20 times
// Providers / routeServiceProviders
Route::middleware(['throttle:visits'])->get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');
Route::get('/search', [App\Http\Controllers\WelcomeController::class, 'search'])->name('articles.search');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');