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
            'nama_siswa' => $this->faker->name('female'),
            'jenis_kelamin' => $this->faker->titleFemale(),
            'kelas_id' => $this->faker->randomElement([ '2022XA','2022XB','2022XC','2022XIA','00000'])
        ];
    }
}
