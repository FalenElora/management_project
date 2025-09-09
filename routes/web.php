<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\ProyekFiturController;
use App\Http\Controllers\ProyekFiturUserController;
use App\Http\Controllers\ProyekCatatanPekerjaanController;



Route::get('/', function () {
    return view('welcome');
});
Route::resource('customer', CustomerController::class);
Route::resource('proyek', ProyekController::class);
Route::resource('proyek_fitur', ProyekFiturController::class);
Route::resource('proyek_fitur_user', ProyekFiturUserController::class);
Route::resource('proyek_catatan_pekerjaan', ProyekCatatanPekerjaanController::class);