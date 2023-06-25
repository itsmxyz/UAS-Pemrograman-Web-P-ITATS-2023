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
            'nama' => 'Ushio Noa', 'username' => 'noaimut','password' => bcrypt('nastar')
        ]);
        SekretarisModel::create([
            'nama' => 'Tsukatsuki Rio', 'username' => 'riobadag','password' => bcrypt('nastar')
        ]);
        SekretarisModel::create([
            'nama' => 'Hayase Yuuka', 'username' => 'yuukaluvsensei', 'password' => bcrypt('nastar')
        ]);
    }
}
