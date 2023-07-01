<?php

namespace App\Models;

use Dflydev\DotAccessData\Data;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class DataKelasQuery extends Model
{
    use HasFactory;

    public function getAllKelas() {
        try {
            $dataKelas = DB::table('kelas')
                ->select('id_kelas','nama_kelas','sensei.nama as wali_kelas')
                ->join('sensei','wali_kelas','=','sensei.id_sensei')
                ->where('id_kelas','>','1000')
                ->orderBy('nama_kelas','ASC')
                ->paginate(6);
            return $dataKelas;
        }catch (QueryException $e) {
            return collect();
        }
    }
    public function getDataKelasById($id_kelas) {
        try {
            $siswa = DB::table('siswa')
                ->select('nis_siswa','nama_siswa')
                ->join('kelas','kelas_id','=','kelas.id_kelas')
                ->where('kelas_id','=',$id_kelas)
                ->orderBy('nama_siswa','ASC')
                ->get();

            $kelas = DB::table('data_kelas')
                ->select('kelas.nama_kelas','mata_pelajaran.nama_mapel')->distinct()
                ->join('kelas','kelas_id','=','kelas.id_kelas')
                ->join('mata_pelajaran','mapel_id','=','mata_pelajaran.id_mapel')
                ->where('kelas_id','=',$id_kelas)
                ->get();
            return compact('kelas','siswa');
        } catch (QueryException $e) {
            return collect();
        }
    }
}
