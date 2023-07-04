<?php

namespace Database\Seeders;

use App\Models\AbsensiModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbsensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        AbsensiModel::factory(1)->create();
    }
}
