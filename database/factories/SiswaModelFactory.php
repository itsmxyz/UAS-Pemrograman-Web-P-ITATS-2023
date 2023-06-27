<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use function Symfony\Component\Translation\t;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SiswaModel>
 */
class SiswaModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_siswa' => $this->faker->name(gender: 'female'),
            'jenis_kelamin' => $this->faker->randomElement(['cewek']),
            'kelas_id' => mt_rand(1000,1003),
        ];
    }
}
