<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\TransaksiController;
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
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('postlogin', [LoginController::class, 'postLogin'])->name('postLogin');
Route::get('registrasi', [LoginController::class, 'registrasi'])->name('registrasi');
Route::post('postregistrasi', [LoginController::class, 'postRegistrasi'])->name('postregistrasi');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard', function () {
        return view('layouts.dashboard');
    });
    Route::resource('katalog',KatalogController::class);
    Route::resource('pegawai',PegawaiController::class);
    Route::resource('user',UserController::class);
    Route::resource('pengeluaran',PengeluaranController::class);
    Route::resource('testimoni',TestimoniController::class);
    Route::resource('transaksi',TransaksiController::class);
    Route::get('customer/cetak_pdf/{member}', [CustomerController::class, 'cetak_pdf'])->name('cetakpdf');
    Route::get('pegawai/cetak_pdf/{pegawai}', [PegawaiController::class, 'cetak_pdf'])->name('cetak_pdf');
    Route::get('transaksi/cetak_pdf/{trans}', [TransaksiController::class, 'cetak_pdf'])->name('payment');
    Route::get('pengeluarans/cetak_pdf', [PengeluaranController::class, 'cetak_pdf'])->name('pengeluaranPdf');
        //ajax
    Route::get('getTransaksi/{id}',[TransaksiController::class,'getPrice']);
});

Route::group(['middleware' => ['auth', 'CekLevel:admin, user']], function(){
    Route::get('/sosialmedia', function () {
        return view('sosmed.sosmed');
});

});

Route::get('/lokasi', function () {
    return view('lokasi.lokasi');
});

Route::get('update', [UserController::class, 'edit'])->name('userUpdate');
Route::patch('updateprofile',  [UserController::class, 'update'])->name('updateProfile');