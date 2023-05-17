<?php

namespace Database\Factories;

use App\Models\TugasAkhir;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SeminarProposal>
 */
class SeminarProposalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tempat' => $this->faker->city,
            'tanggal' => $this->faker->date(),
            'waktu' => $this->faker->time(),
            'nilai_akhir' => $this->faker->numberBetween(1, 100),
            'tugas_akhir_id' => TugasAkhir::pluck('id')->unique()->random(),
        ];
    }
}
