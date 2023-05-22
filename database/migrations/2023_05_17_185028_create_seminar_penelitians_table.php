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
        Schema::create('seminar_penelitians', function (Blueprint $table) {
            $table->id();
            $table->string('tempat');
            $table->date('tanggal');
            $table->time('waktu');
            $table->integer('nilai_akhir')->nullable();
            $table->bigInteger('tugas_akhir_id')->unsigned();
            $table->timestamps();
            $table->unique('tugas_akhir_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seminar_penelitians');
    }
};
