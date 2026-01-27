<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahLayanan = Layanan::count();
        $transaksiBaru = Transaksi::whereDate('waktu_transaksi', Carbon::today())->count();
        $sedangDiproses = Transaksi::where('keterangan', 'proses')->count();
        $belumBayar = Transaksi::where('pembayaran', 'belum bayar')->count();


        $transaksiTerbaru = Transaksi::whereDate('waktu_transaksi', Carbon::today())
            ->latest('waktu_transaksi', 'desc')
            ->get();


        return view('index', compact('jumlahLayanan', 'transaksiBaru', 'sedangDiproses', 'belumBayar', 'transaksiTerbaru'));
    }
}
