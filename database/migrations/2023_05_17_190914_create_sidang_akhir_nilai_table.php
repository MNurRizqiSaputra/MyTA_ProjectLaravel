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
        Schema::create('sidang_akhir_nilai', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sidang_akhir_id')->constrained()->cascadeOnUpdate();
            $table->foreignId('dosen_penguji_id')->constrained()->cascadeOnUpdate();
            $table->integer('nilai')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sidang_akhir_nilai');
    }
};
