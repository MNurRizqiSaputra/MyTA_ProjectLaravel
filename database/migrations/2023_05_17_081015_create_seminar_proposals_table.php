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
        Schema::create('seminar_proposals', function (Blueprint $table) {
            $table->id();
            $table->string('tempat')->nullable();
            $table->date('tanggal')->nullable();
            $table->time('waktu_mulai')->nullable();
            $table->time('waktu_selesai')->nullable();
            $table->integer('nilai_akhir')->nullable();
            $table->foreignId('tugas_akhir_id')->constrained()->cascadeOnUpdate();
            $table->timestamps();
            $table->unique('tugas_akhir_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seminar_proposals');
    }
};
