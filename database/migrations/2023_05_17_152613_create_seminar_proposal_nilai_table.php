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
        Schema::create('seminar_proposal_nilai', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('seminar_proposal_id')->unsigned();
            $table->bigInteger('dosen_penguji_id')->unsigned();
            $table->integer('nilai')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seminar_proposal_nilai');
    }
};
