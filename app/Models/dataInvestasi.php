<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataInvestasi extends Model
{
    use HasFactory;

    protected $fillable=[
        'id_burungs',
        'id_investor',
        'tgl_investasi',
        'tgl_jatuhTempo',
        'status_transaksi',
        'jadwal_investasi',
    ];

    public function databurung() {
        return $this->belongsTo(dataBurung::class,'id_burungs');
    }

    public function datainvestor() {
        return $this->belongsTo(dataInvestor::class,'id_investor');
    }
}
