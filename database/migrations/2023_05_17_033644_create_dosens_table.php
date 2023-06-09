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
        Schema::create('dosens', function (Blueprint $table) {
            $table->id();
            $table->char('nip', 10)->nullable()->unique();
            $table->char('nohp', 15)->nullable();
            $table->text('foto')->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnUpdate();
            $table->foreignId('jurusan_id')->nullable()->constrained()->cascadeOnUpdate();
            $table->timestamps();
            $table->unique('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosens');
    }
};
