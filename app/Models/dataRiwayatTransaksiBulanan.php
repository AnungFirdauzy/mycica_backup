<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataRiwayatTransaksiBulanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_investasi',
        'tgl_transaksi',
        'biaya_perawatan',
        'biaya_tambahan',
        'riwayat_transaksi'
    ];
}
