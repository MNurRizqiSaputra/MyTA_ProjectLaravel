<?php

namespace Database\Seeders;

use App\Models\SeminarProposalNilai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeminarProposalNilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SeminarProposalNilai::factory()->count(10)->create();
    }
}
