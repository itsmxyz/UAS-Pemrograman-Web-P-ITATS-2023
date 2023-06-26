<?php

namespace Database\Seeders;

use App\Models\KelasModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        KelasModel::factory(10)->create();
    }
}
