<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/
Route::get('/', [\App\Http\Controllers\dashboard\HomeController::class, 'index'])->name('admin.home');
Route::resource('users', \App\Http\Controllers\dashboard\UserController::class);
Route::resource('roles', \App\Http\Controllers\dashboard\RoleController::class);
Route::resource('restaurants', \App\Http\Controllers\dashboard\RestaurantController::class);
Route::resource('dishes',\App\Http\Controllers\dashboard\DishController::class);
Route::resource('cities',\App\Http\Controllers\dashboard\CityController::class);
Route::resource('categories',\App\Http\Controllers\dashboard\CategoryController::class);
Route::resource('orders',\App\Http\Controllers\dashboard\OrderController::class);
Route::resource('blogs',\App\Http\Controllers\dashboard\OrderController::class);
Route::resource('blogscategories',\App\Http\Controllers\dashboard\BlogsCategoriesController::class);
Route::resource('tags',\App\Http\Controllers\dashboard\TagController::class);
//Restaurants requests
Route::group(['namespace' => 'restaurant'], function (){
    Route::get('requests', [\App\Http\Controllers\dashboard\RestaurantController::class, 'restaurantRequests'])
        ->name('restaurants.requests');
    Route::post('active/{id}', [\App\Http\Controllers\dashboard\RestaurantController::class, 'activeRestaurant'])
        ->name('restaurants.requests.active');
});
