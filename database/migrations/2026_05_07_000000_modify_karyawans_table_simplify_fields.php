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

            if (Schema::hasColumn('karyawans', 'gaji_pokok')) {
                $table->dropColumn('gaji_pokok');
            }

            if (Schema::hasColumn('karyawans', 'tanggal')) {
                $table->dropColumn('tanggal');
            }

            if (Schema::hasColumn('karyawans', 'terapi_yang_dilakukan')) {
                $table->dropColumn('terapi_yang_dilakukan');
            }

            if (!Schema::hasColumn('karyawans', 'umur')) {
                $table->integer('umur')->after('nama');
            }

            if (!Schema::hasColumn('karyawans', 'jenis_kelamin')) {
                $table->string('jenis_kelamin')->after('umur');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('karyawans', function (Blueprint $table) {

            if (Schema::hasColumn('karyawans', 'umur')) {
                $table->dropColumn('umur');
            }

            if (Schema::hasColumn('karyawans', 'jenis_kelamin')) {
                $table->dropColumn('jenis_kelamin');
            }

            if (!Schema::hasColumn('karyawans', 'gaji_pokok')) {
                $table->decimal('gaji_pokok', 10, 2)->after('nama');
            }

            if (!Schema::hasColumn('karyawans', 'tanggal')) {
                $table->date('tanggal')->after('gaji_pokok');
            }

            if (!Schema::hasColumn('karyawans', 'terapi_yang_dilakukan')) {
                $table->text('terapi_yang_dilakukan')->after('tanggal');
            }
        });
    }
};