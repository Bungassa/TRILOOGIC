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
            // Drop the existing jenis_kelamin column if it exists
            if (Schema::hasColumn('karyawans', 'jenis_kelamin')) {
                $table->dropColumn('jenis_kelamin');
            }

            // Add jenis_kelamin as VARCHAR(1) to accept 'L' or 'P'
            $table->char('jenis_kelamin', 1)->after('umur');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('karyawans', function (Blueprint $table) {
            $table->dropColumn('jenis_kelamin');
        });
    }
};
