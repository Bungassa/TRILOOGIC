<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activity_logs', function (Blueprint $row) {
            $row->id();
            $row->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $row->string('activity');
            $row->string('description')->nullable();
            $row->string('ip_address')->nullable();
            $row->string('user_agent')->nullable();
            $row->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};
