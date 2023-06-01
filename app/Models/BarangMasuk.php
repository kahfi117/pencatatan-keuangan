<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $table = 'barang_masuk';

    protected $fillable = ['id', 'tanggal', 'nama_distributor', 'harga', 'status', 'nominal_cash', 'nominal_kredit', 'nota'];
}
