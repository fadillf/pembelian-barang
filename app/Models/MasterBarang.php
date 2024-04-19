<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterBarang extends Model
{
    use HasFactory;

    protected $table = 'master_barang';

    protected $fillable = [
        'Kode_Barang',
        'Nama_Barang',
        'Satuan',
        'Qty',
        'Harga',
    ];

}
