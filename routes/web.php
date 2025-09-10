<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProyekController;

use App\Http\Controllers\ProyekFiturController;
use App\Http\Controllers\ProyekFiturUserController;
use App\Http\Controllers\ProyekCatatanPekerjaanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProyekInvoiceController;
use App\Http\Controllers\ProyekKwitansiController;
use App\Http\Controllers\ProyekFileController;
use App\Http\Controllers\ProyekUserController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('customer', CustomerController::class);
    Route::resource('proyek', ProyekController::class);

    Route::resource('proyek_fitur', ProyekFiturController::class);
    Route::resource('proyek_fitur_user', ProyekFiturUserController::class);
    Route::resource('proyek_catatan_pekerjaan', ProyekCatatanPekerjaanController::class);

    Route::resource('proyek_invoice', ProyekInvoiceController::class);
    Route::resource('proyek_kwitansi', ProyekKwitansiController::class);
    Route::resource('proyek_file', ProyekFileController::class);
    Route::resource('proyek_user', ProyekUserController::class);
});

//route login logout
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'loginProses'])->name('loginProses');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'registerProses'])->name('registerProses');


