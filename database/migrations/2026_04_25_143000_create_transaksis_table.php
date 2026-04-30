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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->string('nama');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('telepon');
            $table->foreignId('layanan_id')->nullable()->constrained('layanans')->onDelete('cascade');
            $table->enum('lokasi', ['tempat', 'rumah']);
            $table->text('alamat')->nullable();
            $table->date('tanggal');
            $table->time('jam');
            $table->text('catatan')->nullable();
            $table->decimal('total_harga', 10, 2);
            $table->enum('status', ['pending', 'dikerjakan', 'selesai'])->default('pending');
            $table->enum('status_pembayaran', ['belum_bayar', 'lunas'])->default('belum_bayar');
            $table->string('snap_token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
