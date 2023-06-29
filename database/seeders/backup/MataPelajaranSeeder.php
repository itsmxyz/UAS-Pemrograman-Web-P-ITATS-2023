<?php

namespace Database\Seeders\backup;

use App\Models\MataPelajaranModel;
use Illuminate\Database\Seeder;

class MataPelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        MataPelajaranModel::create([
           'kode_mapel' => 'BIO22A', 'nama_mapel' => 'Biologi', 'semester' => 'Ganjil', 'tahun_ajaran' => '2022', 'sensei_id' => '8003'
        ]);
        MataPelajaranModel::create([
            'kode_mapel' => 'BIO22B', 'nama_mapel' => 'Biologi', 'semester' => 'Genap', 'tahun_ajaran' => '2022', 'sensei_id' => '8001'
        ]);
        MataPelajaranModel::create([
            'kode_mapel' => 'MAT22A', 'nama_mapel' => 'Matematika', 'semester' => 'Ganjil', 'tahun_ajaran' => '2022', 'sensei_id' => mt_rand(8000,8004)
        ]);

        MataPelajaranModel::create([
            'kode_mapel' => 'MAT22B', 'nama_mapel' => 'Matematika', 'semester' => 'Genap', 'tahun_ajaran' => '2022', 'sensei_id' => mt_rand(8000,8004)
        ]);
        MataPelajaranModel::create([
            'kode_mapel' => 'FIS22A', 'nama_mapel' => 'Fisika', 'semester' => 'Ganjil', 'tahun_ajaran' => '2022', 'sensei_id' => mt_rand(8000,8004)
        ]);
    }
}
