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
        Schema::create('tugas_akhirs', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->unique();
            $table->string('file');
            $table->enum('status_persetujuan', ['Disetujui', 'Tidak Disetujui'])->default('Tidak Disetujui');
            $table->integer('total_nilai')->nullable();
            $table->foreignId('mahasiswa_id')->constrained('mahasiswas')->onDelete('cascade');
            $table->foreignId('dosen_pembimbing_id')->constrained('dosen_pembimbings')->onDelete('cascade');
            $table->timestamps();
            $table->unique('mahasiswa_id'); // Menambahkan indeks unik pada kolom mahasiswa_id
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tugas_akhirs');
    }
};
