<?php

namespace Database\Seeders;

use App\Models\SeminarProposal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeminarProposalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SeminarProposal::factory()->count(3)->create();
    }
}
