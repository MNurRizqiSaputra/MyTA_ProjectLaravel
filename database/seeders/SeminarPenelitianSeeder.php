<?php

namespace Database\Seeders;

use App\Models\SeminarPenelitian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeminarPenelitianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SeminarPenelitian::factory()->count(3)->create();
    }
}
