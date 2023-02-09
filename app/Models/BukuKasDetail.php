<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuKasDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function buku_kas(){
        return $this->belongsTo(BukuKas::class, 'buku_kas_id');
    }

    public function sumber_pemasukann(){
        return $this->belongsTo(SumberPemasukan::class, 'sumber_pemasukan_id', 'id');
    }
    
}
