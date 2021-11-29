<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataBurung extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_peternak',
        'nama_burung',
        'tanggal_menetas',
        'tanggal_max_investasi',
        'jenis_kelamin',
        'berat',
        'riwayat_medis',
        'foto_burung',
        'biaya_tambahan',
        'jadwal_perawatan',
        'status'
    ];

    public function datapeternak() {
        return $this->belongsTo(dataPeternak::class,'id_peternak');
    }
}
