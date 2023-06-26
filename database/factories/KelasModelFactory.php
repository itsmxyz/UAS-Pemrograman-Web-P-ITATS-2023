<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KelasModel>
 */
class KelasModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'kode_kelas' => $this->faker->word(),
            'nama' => $this->faker->randomElement(['Biologi']),
            'mata_pelajaran' => $this->faker->randomElement(['Biologi']),
            'sensei_id' => $this->faker->randomElement(['8000','8000','8002','8003','8004']),
        ];
    }
}
