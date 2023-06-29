<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class DataKelasQuery extends Model
{
    use HasFactory;

    public function insertMapelToKelas() {
        $kelas = KelasModel::find(1002);
        $mapel = MataPelajaranModel::find(1003);


        $hasil = DB::table('data_kelas')
            ->select('kelas.nama_kelas as kelas', 'mata_pelajaran.nama_mapel as mapel')
            ->join('kelas','kelas_id','=','kelas.id_kelas')
            ->join('mata_pelajaran','mapel_id','=','mata_pelajaran.id_mapel')
            ->where('kelas_id', 1004)
            ->get();
        dd($hasil);
    }
    public function getAllKelas() {
        try {
            $dataKelas = DB::table('kelas')
                ->select('id_kelas as id_kelas','nama_kelas','sensei.nama_sensei')
                ->distinct()
                ->join('sensei','sensei_id','=','sensei.id_sensei')
                ->paginate(9);
            return $dataKelas;
        }catch (QueryException $e) {
            return collect();
        }
    }
}
