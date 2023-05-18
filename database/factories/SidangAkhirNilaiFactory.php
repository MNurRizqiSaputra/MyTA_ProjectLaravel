<?php

namespace Database\Factories;

use App\Models\DosenPenguji;
use App\Models\SidangAkhir;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SidangAkhirNilai>
 */
class SidangAkhirNilaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sidang_akhir_id' => $this->faker->numberBetween(1, SidangAkhir::count()),
            'dosen_penguji_id' => $this->faker->numberBetween(1, DosenPenguji::count()),
            'nilai' => $this->faker->numberBetween(1, 100)
        ];
    }
}
