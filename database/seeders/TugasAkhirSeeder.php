<?php

namespace Database\Seeders;

use App\Models\TugasAkhir;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TugasAkhirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TugasAkhir::factory()->count(8)->create();
    }
}
