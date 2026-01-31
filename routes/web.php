<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;



Route::get('/',[DashboardController::class, 'index'])->name('index');

// LAYANAN 

Route::get('/layanan', [LayananController::class, 'index'])->name('layanan');
Route::post('/tambah_layanan', [LayananController::class, 'store'])->name('tambah_layanan');
Route::put('/ubah_layanan/{id}', [LayananController::class, 'update'])->name('ubah_layanan');
Route::delete('/hapus_layanan/{id}', [LayananController::class, 'destroy'])->name('hapus_layanan');

// TRANSAKSI 
Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
Route::post('/tambah_transaksi', [TransaksiController::class, 'store'])->name('tambah_transaksi');
Route::put('/ubah_transaksi/{id}', [TransaksiController::class, 'update'])->name('ubah_transaksi');
Route::delete('/hapus_transaksi/{id}', [TransaksiController::class, 'destroy'])->name('hapus_transaksi');
Route::get('/hal-cetak/{id}', [TransaksiController::class, 'show'])->name('hal-cetak');
Route::get('/transaksi_bayar/{id}', [TransaksiController::class, 'bayar'])->name('transaksi_bayar');









