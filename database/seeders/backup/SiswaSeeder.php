<?php

namespace Database\Seeders\backup;

use App\Models\SiswaModel;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        SiswaModel::factory(75)->create();
    }
}
