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
        KelasModel::create([ 'id_kelas' => '00000', 'nama_kelas' => 'Siswa baru','wali_kelas' => '8001']);
        KelasModel::create([ 'id_kelas' => '2022XA', 'nama_kelas' => 'X-A','wali_kelas' => '8002']);
        KelasModel::create([ 'id_kelas' => '2022XB', 'nama_kelas' => 'X-B','wali_kelas' => '8003']);
        KelasModel::create([ 'id_kelas' => '2022XC', 'nama_kelas' => 'X-C','wali_kelas' => '8004']);
        KelasModel::create([ 'id_kelas' => '2022XIA', 'nama_kelas' => 'XI-A','wali_kelas' => '8000']);
    }
}
