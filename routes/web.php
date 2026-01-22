<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('index');
});
Route::get('/layanan', function () {
    return view('layanan');
});
Route::get('/transaksi', function () {
    return view('transaksi');
});
Route::get('/hal-cetak', function () {
    return view('hal-cetak');
});
