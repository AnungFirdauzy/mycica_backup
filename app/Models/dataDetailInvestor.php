<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataDetailInvestor extends Model
{
    use HasFactory;

    protected $fillable=[
        'id_investor',
        'alamat',
        'rtRw',
        'kabupatenkota',
        'kodepos',
        'ttl',
        
    ];

    public function datainvestor() {
        return $this->belongsTo(dataDetailInvestor::class,'id_investor');
    }
}
