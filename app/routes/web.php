<?php

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

Route::get('/', \App\Http\Controllers\IndexController::class)->name('home');

Route::group(['prefix'=>'register'], function(){
    Route::get('/', [\App\Http\Controllers\RegisterationController::class, 'index'])->name('register');
    Route::post('/', [\App\Http\Controllers\RegisterationController::class, 'create'])->name('register.submit');
});

Route::get('/search', \App\Http\Controllers\SearchController::class)->name('checkStatus');
