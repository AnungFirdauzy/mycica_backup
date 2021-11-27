<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataPenjualanBurung extends Model
{
    use HasFactory;

    protected $fillable=[
        'id_investasi',
        'tgl_terjual',
        'nama_pembeli',
        'phone',
        'status_penjualan',
        'harga_jual',
        'nominal_transfer'
    ];

    public function datainvestasi(){
        return $this->belongsTo(dataInvestasi::class,'id_investasi');
    }
}
