<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class dataInvestor extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    public function datainvestasi(){
        return $this->hasMany(dataInvestasi::class,'id_investor');
    }
}
