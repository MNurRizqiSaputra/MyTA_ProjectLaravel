<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Faker\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Factory::create('id_ID');
        $faker->seed(17);

        $this->call(JurusanSeeder::class);
        $this->call(RoleSeeder::class);
        // $this->call(UserSeeder::class);
        // $this->call(DosenSeeder::class);
        // $this->call(MahasiswaSeeder::class);
        // $this->call(DosenPembimbingSeeder::class);
        // $this->call(DosenPengujiSeeder::class);
        // $this->call(TugasAkhirSeeder::class);
        // $this->call(SeminarProposalSeeder::class);
        // $this->call(SeminarProposalNilaiSeeder::class);
        // $this->call(SeminarPenelitianSeeder::class);
        // $this->call(SeminarPenelitianNilaiSeeder::class);
        // $this->call(SidangAkhirSeeder::class);
        // $this->call(SidangAkhirNilaiSeeder::class);
    }
}
