<?php

namespace App\Models;

use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = [
        'nama_barang',
        'gambar',
        'stock',
        'jenis_barang'
    ];

    // public function transaksi()
    // {
    //     return $this->belongsTo(Transaksi::class, 'id', 'id_barang');
    // }
}
