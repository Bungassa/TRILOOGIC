<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add new enum values if necessary or just change the whole column
        // We'll just alter the column and update existing rows
        DB::statement("ALTER TABLE transaksis MODIFY COLUMN status ENUM('pending', 'dikerjakan', 'selesai', 'dibatalkan', 'menunggu', 'proses') DEFAULT 'menunggu'");
        
        DB::table('transaksis')->where('status', 'pending')->update(['status' => 'menunggu']);
        DB::table('transaksis')->where('status', 'dikerjakan')->update(['status' => 'proses']);

        DB::statement("ALTER TABLE transaksis MODIFY COLUMN status ENUM('menunggu', 'proses', 'selesai', 'dibatalkan') DEFAULT 'menunggu'");

        Schema::table('transaksis', function (Blueprint $table) {
            if (Schema::hasColumn('transaksis', 'bed_id')) {
                $table->dropColumn('bed_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksis', function (Blueprint $table) {
            $table->integer('bed_id')->nullable()->after('karyawan_id');
        });

        DB::statement("ALTER TABLE transaksis MODIFY COLUMN status ENUM('menunggu', 'proses', 'selesai', 'dibatalkan', 'pending', 'dikerjakan') DEFAULT 'pending'");
        
        DB::table('transaksis')->where('status', 'menunggu')->update(['status' => 'pending']);
        DB::table('transaksis')->where('status', 'proses')->update(['status' => 'dikerjakan']);

        DB::statement("ALTER TABLE transaksis MODIFY COLUMN status ENUM('pending', 'dikerjakan', 'selesai', 'dibatalkan') DEFAULT 'pending'");
    }
};
