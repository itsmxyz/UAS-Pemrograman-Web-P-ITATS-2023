<?php

namespace Database\Seeders\backup;

use App\Models\KelasModel;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KelasModel::create([ 'kode_kelas' => ' - ', 'nama_kelas' => 'SiswaModel baru',]);
        KelasModel::create([ 'kode_kelas' => '2022XA', 'nama_kelas' => 'X-A',]);
        KelasModel::create([ 'kode_kelas' => '2022XB', 'nama_kelas' => 'X-B',]);
        KelasModel::create([ 'kode_kelas' => '2022XC', 'nama_kelas' => 'X-C',]);
        KelasModel::create([ 'kode_kelas' => '2022XIA', 'nama_kelas' => 'XI-A',]);
    }
}
