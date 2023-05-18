<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jurusan>
 */
class JurusanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $daftar_jurusan = ['Sistem Informasi', 'Teknik Informatika', 'Multimedia'];
        return [
            'nama' => $this->faker->unique()->randomElement($daftar_jurusan)
        ];
    }
}
