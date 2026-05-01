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
        Schema::table('karyawans', function (Blueprint $table) {
            $table->string('nik')->unique()->after('id')->nullable();
            $table->string('jabatan')->after('nama')->nullable();
            $table->decimal('gaji_pokok', 15, 2)->after('jabatan')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('karyawans', function (Blueprint $table) {
            $table->dropColumn(['nik', 'jabatan', 'gaji_pokok']);
        });
    }
};
