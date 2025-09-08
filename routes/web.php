<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProyekController;



Route::get('/', function () {
    return view('welcome');
});
Route::resource('customer', CustomerController::class);
Route::resource('proyek', ProyekController::class);