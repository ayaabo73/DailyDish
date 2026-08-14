<?php

use App\Http\Controllers\DishController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('dishes.index');
});

Route::controller(DishController::class)->group(function()
{
    Route::get('/dish','index')->name('dish.index');
    Route::post('/dish/create','store')->name('dish.store');
    Route::get('/dish/{dish}/edit','edit')->name('dish.edit');
    Route::patch('/dish/{dish}','update')->name('dish.update');
    Route::delete('/dish/{dish}','destroy')->name('dish.destroy');
});