<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Illuminate\Http\Request;

class ControllerTransaksi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi=transaksi::all();
        return view('transaksi');
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'waktu_transaksi'=>'required',
            'nama_pelanggan'=>'required',
            'id_layanan'=>'required',
            'berat'=>'required',
            'pembayaran'=>'required',
        ]);

        transaksi::create([
            'waktu_transaksi'=>$request->waktu_transaksi,
            'nama_pelanggan'=>$request->nama_pelanggan,
            'id_layanan'=>$request->id_layanan,
            'berat'=>$request->berat,
            'pembayaran'=>$request->pembayaran
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'waktu_transaksi'=>'required',
            'nama_pelanggan'=>'required',
            'id_layanan'=>'required',
            'berat'=>'required',
            'pembayaran'=>'required',
        ]);

        $transaksi=transaksi::findOrFail($id);
        $transaksi->update([
            'waktu_transaksi'=>$request->waktu_transaksi,
            'nama_pelanggan'=>$request->nama_pelanggan,
            'id_layanan'=>$request->id_layanan,
            'berat'=>$request->berat,
            'pembayaran'=>$request->pembayaran
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = transaksi::findOrFail($id);
        $delete->delete();
        return redirect()->back();
    }
}
