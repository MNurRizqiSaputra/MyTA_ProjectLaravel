<?php

namespace Database\Seeders;

use App\Models\DosenPenguji;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DosenPengujiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DosenPenguji::factory()->count(5)->create();
    }
}
