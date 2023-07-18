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
Auth::routes();
//front home page
Route::get('/',[\App\Http\Controllers\frontend\HomeController::class,'index'])->name('front.home');
//sign up page
Route::get('/sign-up',[\App\Http\Controllers\Auth\RegisterController::class,'frontPage'])->name('front.register');
//submit restaurant
Route::get('/submit-restaurant',[\App\Http\Controllers\frontend\RestaurantController::class,'submitPage'])
    ->name('front.submit-restaurant.index');
Route::post('submit-restaurant',[\App\Http\Controllers\frontend\RestaurantController::class,'storeRequest'])
    ->name('front.submit-restaurant.storeRequest');
