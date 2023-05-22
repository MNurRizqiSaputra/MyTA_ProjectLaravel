<?php

namespace Database\Seeders;

use App\Models\SidangAkhirNilai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SidangAkhirNilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SidangAkhirNilai::factory()->count(3)->create();
    }
}
