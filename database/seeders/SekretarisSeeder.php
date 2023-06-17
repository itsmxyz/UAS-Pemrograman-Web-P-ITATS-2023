<?php

namespace Database\Seeders;

use App\Models\SekretarisModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SekretarisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        SekretarisModel::create([
            'nama' => 'Noa', 'username' => 'Noa','password' => bcrypt('Orang')
        ]);
        SekretarisModel::create([
            'nama' => 'Rio', 'username' => 'Rio','password' => bcrypt('Belut')
        ]);
        SekretarisModel::create([
            'nama' => 'Yuuka', 'username' => 'Yuuka', 'password' => bcrypt('Gomen')
        ]);
    }
}
