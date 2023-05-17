<?php

namespace Database\Factories;

use App\Models\Jurusan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // ambil semua id unik mahasiswa dengan role mahasiswa (role_id = 2)
        $mahasiswa = User::where('role_id', 2)->pluck('id')->toArray();
        return [
            'nim' => $this->faker->unique()->numerify('17########'),
            'foto' => 'default.png',
            'user_id' => $this->faker->unique()->randomElement($mahasiswa),
            'jurusan_id' => $this->faker->numberBetween(1, Jurusan::count()),
        ];
    }
}
