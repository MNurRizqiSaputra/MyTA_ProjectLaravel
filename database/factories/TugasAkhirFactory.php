<?php

namespace Database\Factories;

use App\Models\DosenPembimbing;
use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TugasAkhir>
 */
class TugasAkhirFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => $this->faker->sentence(),
            'file' => $this->faker->name() . '.pdf',
            'status_persetujuan' => $this->faker->randomElement(['Disetujui', 'Tidak Disetujui']),
            'total_nilai' => $this->faker->numberBetween(0, 100),
            'mahasiswa_id' => $this->faker->unique()->numberBetween(1, Mahasiswa::count()),
            'dosen_pembimbing_id' => $this->faker->numberBetween(1, DosenPembimbing::count()),
        ];
    }
}
