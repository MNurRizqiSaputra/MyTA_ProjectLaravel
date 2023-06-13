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
        Schema::table('seminar_proposals', function (Blueprint $table) {
            $table->dropColumn('waktu');
            $table->time('waktu_mulai')->nullable();
            $table->time('waktu_selesai')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('seminar_proposals', function (Blueprint $table) {
            $table->time('waktu')->nullable();
            $table->dropColumn('waktu_mulai');
            $table->dropColumn('waktu_selesai');
        });
    }
};
