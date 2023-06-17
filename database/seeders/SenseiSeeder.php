<?php

namespace Database\Seeders;

use App\Models\SenseiModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SenseiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        SenseiModel::create([
            'nama' => 'Ubedz', 'username' => 'Ubedz', 'password' => bcrypt('Ubedz'), 'kantor' => 'Schale Office Residence', 'sekretaris_id' => '201'
        ]);
        SenseiModel::create([
            'nama' => 'BangSat', 'username' => 'BangSat','password' => bcrypt('bgst'), 'kantor' => 'Schale Office Residence', 'sekretaris_id' => '203'
        ]);
        SenseiModel::create([
            'nama' => 'Esanime', 'username' => 'Esanime', 'password' => bcrypt('gresik'), 'kantor' => 'Millennium Sensei HomeStay', 'sekretaris_id' => '201'
        ]);
        SenseiModel::create([
            'nama' => 'Shinota', 'username' => 'Shinota', 'password' => bcrypt('shinotaa'), 'kantor' => 'Millennium Sensei HomeStay', 'sekretaris_id' => '202'
        ]);
        SenseiModel::create([
            'nama' => 'Fumino', 'username' => 'Fumino', 'password' => bcrypt('fuminocchi'), 'kantor' => 'Schale Office Residence', 'sekretaris_id' => '201'
        ]);
    }
}
