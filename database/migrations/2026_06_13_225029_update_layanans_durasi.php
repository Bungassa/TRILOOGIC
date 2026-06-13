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
        DB::table('layanans')->where('id', 1)->update(['durasi' => 60]);
        DB::table('layanans')->where('id', 2)->update(['durasi' => 90]);
        DB::table('layanans')->whereIn('id', [3, 4, 5])->update(['durasi' => 45]);
        DB::table('layanans')->whereIn('id', [6, 7, 8, 9, 10, 11, 12])->update(['durasi' => 30]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert to 60 as a default if we rollback
        DB::table('layanans')->update(['durasi' => 60]);
    }
};
