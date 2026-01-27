<?php

namespace App\Http\Controllers;

use App\Models\layanan;
use Illuminate\Http\Request;

class ControllerLayanan extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layanan=layanan::all();
        return view('layanan',compact('layanan'));
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
            'nama_layanan'=>'required',
            'harga_per_kg'=>'required',
        ]);

        layanan::create([
            'nama_layanan'=>$request->nama_layanan,
            'harga_per_kg'=>$request->harga_per_kg,
        ]);


        return redirect()->back()->with('success', 'layanan berhasil ditambahkan!');
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
            'nama_layanan'=>'required',
            'harga_per_kg'=>'required'
        ]);

        $layanan=layanan::findOrFail($id);
        $layanan->update([
            'nama_layanan'=>$request->nama_layanan,
            'harga_per_kg'=>$request->harga_per_kg
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $layanan=layanan::findOrFail($id);
        $layanan->delete();
        return redirect()->back();
    }
}
