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
        Schema::table('sidang_akhirs', function (Blueprint $table) {
            $table->string('tempat')->nullable()->change();
            $table->date('tanggal')->nullable()->change();
            $table->time('waktu')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sidang_akhirs', function (Blueprint $table) {
            //
        });
    }
};
