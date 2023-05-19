<?php

namespace Database\Seeders;

use App\Models\SidangAkhir;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SidangAkhirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SidangAkhir::factory()->create();
    }
}
