<?php

namespace Database\Factories;

use App\Models\DosenPenguji;
use App\Models\SeminarProposal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SeminarProposalNilai>
 */
class SeminarProposalNilaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'seminar_proposal_id' => $this->faker->numberBetween(1, SeminarProposal::count()),
            'dosen_penguji_id' => $this->faker->numberBetween(1, DosenPenguji::count()),
            'nilai' => $this->faker->numberBetween(1, 100)
        ];
    }
}
