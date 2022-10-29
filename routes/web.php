<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PengeluaranController;
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

Route::resource('katalog',KatalogController::class);
Route::resource('pegawai',PegawaiController::class);
Route::resource('customer',CustomerController::class);
Route::resource('pengeluaran',PengeluaranController::class);

Route::get('/sosialmedia', function () {
    return view('sosmed.sosmed');
});