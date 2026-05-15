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
        Schema::dropIfExists('penggajians');
        
        Schema::create('penggajians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('karyawan_id')->constrained('karyawans')->onDelete('cascade');
            $table->foreignId('layanan_id')->constrained('layanans')->onDelete('cascade');
            $table->foreignId('transaksi_id')->constrained('transaksis')->onDelete('cascade');
            $table->decimal('upah_karyawan', 15, 2);
            $table->decimal('pendapatan_owner', 15, 2);
            $table->enum('status_pembayaran', ['pending', 'dibayar'])->default('pending');
            $table->date('tanggal_bayar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penggajians');
    }
};
