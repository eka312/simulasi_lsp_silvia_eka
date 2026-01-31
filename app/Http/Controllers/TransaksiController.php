<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = Transaksi::all();
        $layanan = Layanan::all();
        return view('transaksi', compact('transaksi', 'layanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'waktu_transaksi' => 'required',
            'nama_pelanggan' => 'required',
            'no_telp' => 'required',
            'id_layanan' => 'required',
            'berat' => 'required',
            'keterangan' => 'required',
            'pembayaran' => 'required',
        ]);

        Transaksi::create([
            'waktu_transaksi' => $request->waktu_transaksi,
            'nama_pelanggan' => $request->nama_pelanggan,
            'no_telp' => $request->no_telp,
            'id_layanan' => $request->id_layanan,
            'berat' => $request->berat,
            'keterangan' => $request->keterangan,
            'pembayaran' => $request->pembayaran,
        ]);

        return redirect()->back()->with('store', 'Transaksi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('/hal-cetak', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'waktu_transaksi' => 'required',
            'nama_pelanggan' => 'required',
            'no_telp' => 'required',
            'id_layanan' => 'required',
            'berat' => 'required',
            'keterangan' => 'required',
           
        ]);
        
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update([
            'waktu_transaksi' => $request->waktu_transaksi,
            'nama_pelanggan' => $request->nama_pelanggan,
            'no_telp' => $request->no_telp,
            'id_layanan' => $request->id_layanan,
            'berat' => $request->berat,
            'keterangan' => $request->keterangan,
           
        ]);

        return redirect()->back()->with('update', 'Transaksi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Transaksi::findOrFail($id);
        $delete->delete();
        return redirect()->back()->with('deleted', 'Transaksi berhasil dihapus.');
    }

    public function bayar(string $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update([
            'pembayaran' => 'Lunas',
        ]);

        return redirect()->back()->with('bayar', 'Transaksi berhasil dibayar.');
    }

    
}
