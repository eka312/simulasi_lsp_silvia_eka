<?php

namespace App\Http\Controllers;

use App\Models\layanan;
use App\Models\transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ControllerDashboard extends Controller
{
    public function index()
    {
        $jumlahLayanan = layanan::count();
        $transaksiBaru = transaksi::whereDate('waktu_transaksi', Carbon::today())->count();
        $sedangDiproses = transaksi::where('keterangan', 'proses')->count();
        $belumBayar = transaksi::where('pembayaran', 'belum bayar')->count();


        $transaksiTerbaru = transaksi::whereDate('waktu_transaksi', Carbon::today())
            ->latest('waktu_transaksi', 'desc')
            ->get();


        return view('index', compact('jumlahLayanan', 'transaksiBaru', 'sedangDiproses', 'belumBayar', 'transaksiTerbaru'));
    }
}
