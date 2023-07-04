<?php

namespace Database\Seeders;

use App\Models\PenilaianModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        PenilaianModel::factory(1)->create();
    }
}
