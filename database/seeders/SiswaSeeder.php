<?php

namespace Database\Seeders;

use App\Models\SiswaModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        SiswaModel::factory(75)->create();
        DB::table('data_kelas')->insert(['kelas_id'=>'2022XA','mapel_id'=>'1001']);
        DB::table('data_kelas')->insert(['kelas_id'=>'2022XA','mapel_id'=>'1002']);
        DB::table('data_kelas')->insert(['kelas_id'=>'2022XA','mapel_id'=>'1003']);
        DB::table('data_kelas')->insert(['kelas_id'=>'2022XB','mapel_id'=>'1002']);
        DB::table('data_kelas')->insert(['kelas_id'=>'2022XB','mapel_id'=>'1003']);
        DB::table('data_kelas')->insert(['kelas_id'=>'2022XC','mapel_id'=>'1003']);
        DB::table('data_kelas')->insert(['kelas_id'=>'2022XIA','mapel_id'=>'1004']);
    }
}
