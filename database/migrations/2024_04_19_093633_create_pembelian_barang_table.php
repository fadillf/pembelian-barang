<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pembelian_barang', function (Blueprint $table) {
            $table->id();
            $table->string('Nomor_Pembelian');
            $table->date('Tanggal');
            $table->string('Kode_Barang')->unique();
            $table->string('Satuan')->unique();
            $table->decimal('Qty', 10, 2);
            $table->decimal('Harga', 10, 2);
            $table->decimal('Diskon', 10, 2);
            $table->decimal('Subtotal', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelian_barang');
    }
};
