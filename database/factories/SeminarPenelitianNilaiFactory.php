<?php

namespace Database\Factories;

use App\Models\DosenPenguji;
use App\Models\SeminarPenelitian;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SeminarPenelitianNilai>
 */
class SeminarPenelitianNilaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'seminar_penelitian_id' => $this->faker->numberBetween(1, SeminarPenelitian::count()),
            'dosen_penguji_id' => $this->faker->numberBetween(1, DosenPenguji::count()),
            'nilai' => $this->faker->numberBetween(1, 100)
        ];
    }
}
