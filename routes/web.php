<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\ProyekInvoiceController;
use App\Http\Controllers\ProyekKwitansiController;
use App\Http\Controllers\ProyekFileController;
use App\Http\Controllers\ProyekUserController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('customer', CustomerController::class);
Route::resource('proyek', ProyekController::class);
Route::resource('proyek_invoice', ProyekInvoiceController::class);
Route::resource('proyek_kwitansi', ProyekKwitansiController::class);
Route::resource('proyek_file', ProyekFileController::class);
Route::resource('proyek_user', ProyekUserController::class);


