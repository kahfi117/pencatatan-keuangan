<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuKas extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function buku_kas_detailss(){
        return $this->hasMany(BukuKasDetail::class,'buku_kas_id');
    }
}
