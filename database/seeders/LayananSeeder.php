<?php

namespace Database\Seeders;

use App\Models\layanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        layanan::create([
            'nama_layanan' => 'Cuci Kering',
            'harga_per_kg' => 5000,
        ]);

        layanan::create([
            'nama_layanan' => 'Cuci Setrika',
            'harga_per_kg' => 8000,
        ]);

        layanan::create([
            'nama_layanan' => 'Setrika Saja',
            'harga_per_kg' => 4000,
        ]);

        
    }
}
