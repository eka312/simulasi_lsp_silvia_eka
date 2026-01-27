<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $table = 'transaksis';
    protected $primaryKey = 'id_transaksi';

    protected $guarded = [];

    public function layanan()
    {
        return $this->belongsto(layanan::class, 'id_layanan', 'id_layanan');
    }
}
