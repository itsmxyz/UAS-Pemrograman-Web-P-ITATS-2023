<?php

namespace Database\Seeders;

use App\Models\AdminModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdminModel::create([
            'username' => 'Mint','password' => bcrypt('hehey')
        ]);
        AdminModel::create([
            'username' => 'ngawi','password' => bcrypt('belut')
        ]);
        AdminModel::create([
            'username' => 'nenen','password' => bcrypt('akmw')
        ]);
    }
}
