<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianBarang extends Model
{
    use HasFactory;

    protected $table = 'pembelian_barang';

    protected $fillable = [
        'Nomor_Pembelian',
        'Tanggal',
        'Kode_Barang',
        'Satuan',
        'Qty',
        'Harga',
        'Diskon',
        'Subtotal',
    ];
}
