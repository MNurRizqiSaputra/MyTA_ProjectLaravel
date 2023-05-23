<?php

namespace Database\Seeders;

use App\Models\SeminarPenelitianNilai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeminarPenelitianNilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SeminarPenelitianNilai::factory()->count(3)->create();
    }
}
