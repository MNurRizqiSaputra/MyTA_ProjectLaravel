<?php

namespace Database\Factories;

use App\Models\Jurusan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dosen>
 */
class DosenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // ambil semua id unik dosen dengan role dosen (role_id = 1)
        $dosen = User::where('role_id', 1)->pluck('id')->unique()->toArray();
        return [
            'nip' => $this->faker->unique()->numerify('99########'),
            'nohp' => null,
            'foto' => 'default.png',
            'user_id' => $this->faker->unique()->randomElement($dosen),
            'jurusan_id' => $this->faker->numberBetween(1, Jurusan::count()),
        ];
    }
}
