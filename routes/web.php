<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProyekController;
<<<<<<< HEAD
use App\Http\Controllers\ProyekFiturController;
use App\Http\Controllers\ProyekFiturUserController;
use App\Http\Controllers\ProyekCatatanPekerjaanController;


=======
use App\Http\Controllers\ProyekInvoiceController;
use App\Http\Controllers\ProyekKwitansiController;
use App\Http\Controllers\ProyekFileController;
use App\Http\Controllers\ProyekUserController;
>>>>>>> a32fc37c1052d77125b5242a9f3d698713bc561d

Route::get('/', function () {
    return view('welcome');
});
Route::resource('customer', CustomerController::class);
Route::resource('proyek', ProyekController::class);
<<<<<<< HEAD
Route::resource('proyek_fitur', ProyekFiturController::class);
Route::resource('proyek_fitur_user', ProyekFiturUserController::class);
Route::resource('proyek_catatan_pekerjaan', ProyekCatatanPekerjaanController::class);
=======
Route::resource('proyek_invoice', ProyekInvoiceController::class);
Route::resource('proyek_kwitansi', ProyekKwitansiController::class);
Route::resource('proyek_file', ProyekFileController::class);
Route::resource('proyek_user', ProyekUserController::class);


>>>>>>> a32fc37c1052d77125b5242a9f3d698713bc561d
