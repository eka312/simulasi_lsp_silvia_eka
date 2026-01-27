<?php

namespace Database\Seeders;

use App\Models\transaksi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        transaksi::create([
            'waktu_transaksi' => '2024-06-01 10:00:00',
            'nama_pelanggan' => 'Andi',
            'id_layanan' => 1,
            'berat' => 3,
            'keterangan' => 'selesai',
            'pembayaran' => 'Lunas',
        ]);

        transaksi::create([
            'waktu_transaksi' => '2024-06-02 11:30:00',
            'nama_pelanggan' => 'Budi',
            'id_layanan' => 2,
            'berat' => 5,
            'keterangan' => 'proses',
            'pembayaran' => 'belum bayar',
        ]);
    }
}
