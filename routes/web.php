<?php

use App\Http\Controllers\ControllerDashboard;
use App\Http\Controllers\ControllerLayanan;
use App\Http\Controllers\ControllerTransaksi;
use Illuminate\Support\Facades\Route;


Route::get('/hal-cetak', function () {
    return view('hal-cetak');
});


Route::get('/',[ControllerDashboard::class, 'index'])->name('index');

// ===== LAYANAN =====

Route::get('/layanan', [ControllerLayanan::class, 'index'])->name('layanan');
Route::post('/tambah_layanan', [ControllerLayanan::class, 'store'])->name('tambah_layanan');
Route::put('/ubah_layanan/{id}', [ControllerLayanan::class, 'update'])->name('ubah_layanan');
Route::delete('/hapus_layanan/{id}', [ControllerLayanan::class, 'destroy'])->name('hapus_layanan');

// ===== TRANSAKSI =====
Route::get('/transaksi', [ControllerTransaksi::class, 'index'])->name('transaksi');
Route::post('/tambah_transaksi', [ControllerTransaksi::class, 'store'])->name('tambah_transaksi');
Route::put('/ubah_transaksi/{id}', [ControllerTransaksi::class, 'update'])->name('ubah_transaksi');
Route::delete('/hapus_transaksi/{id}', [ControllerTransaksi::class, 'destroy'])->name('hapus_transaksi');








