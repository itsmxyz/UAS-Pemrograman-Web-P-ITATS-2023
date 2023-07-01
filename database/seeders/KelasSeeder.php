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
        KelasModel::create([ 'id_kelas' => '00000', 'nama_kelas' => ' - ','wali_kelas' => '8001']);
        KelasModel::create([ 'id_kelas' => '2022XA', 'nama_kelas' => 'X-A','wali_kelas' => '8002']);
        KelasModel::create([ 'id_kelas' => '2022XB', 'nama_kelas' => 'X-B','wali_kelas' => '8003']);
        KelasModel::create([ 'id_kelas' => '2022XC', 'nama_kelas' => 'X-C','wali_kelas' => '8004']);
        KelasModel::create([ 'id_kelas' => '2022XIA', 'nama_kelas' => 'XI-A','wali_kelas' => '8000']);
        KelasModel::create([ 'id_kelas' => '2022XIB', 'nama_kelas' => 'XI-B','wali_kelas' => '8002']);
        KelasModel::create([ 'id_kelas' => '2022XIC', 'nama_kelas' => 'XI-C','wali_kelas' => '8001']);
        KelasModel::create([ 'id_kelas' => '2022XID', 'nama_kelas' => 'XI-D','wali_kelas' => '8004']);
        KelasModel::create([ 'id_kelas' => '2022XIE', 'nama_kelas' => 'XI-E','wali_kelas' => '8003']);
        KelasModel::create([ 'id_kelas' => '2022XIIA', 'nama_kelas' => 'XII-A','wali_kelas' => '8004']);
        KelasModel::create([ 'id_kelas' => '2022XIIB', 'nama_kelas' => 'XII-B','wali_kelas' => '8003']);
        KelasModel::create([ 'id_kelas' => '2022XIIC', 'nama_kelas' => 'XII-C','wali_kelas' => '8001']);
    }
}
