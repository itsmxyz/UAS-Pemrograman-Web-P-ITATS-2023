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
            try {
                $siswa = DB::table('siswa')
                    ->select('nis_siswa','nama_siswa','jenis_kelamin')
                    ->join('kelas','kelas_id','=','kelas.id_kelas')
                    ->where('kelas_id','=',$id_kelas)
                    ->orderBy('nama_siswa','ASC')
                    ->get();
            }catch (QueryException $e){
                $siswa=[];
            }
            try {
                $kelas = DB::table('kelas')
                    ->select('id_kelas','nama_kelas','sensei.id_sensei','sensei.nama as wali_kelas')->distinct()
                    ->join('sensei','wali_kelas','=','id_sensei')
                    ->where('id_kelas','=',$id_kelas)
                    ->first();
            }catch (QueryException $e){
                $kelas=[];
            }
            return compact('siswa','kelas');
        } catch (QueryException $e) {
            return collect();
        }
    }
    public function getKelasBySensei($id_sensei) {
        try {
            try {
                $siswa = DB::table('siswa')
                    ->select('nis_siswa','nama_siswa','jenis_kelamin')
                    ->join('kelas','kelas_id','=','kelas.id_kelas')
                    ->where('kelas_id','=',$id_sensei)
                    ->orderBy('nama_siswa','ASC')
                    ->get();
            }catch (QueryException $e){
                $siswa=[];
            }
            try {
                $kelas = DB::table('kelas')
                    ->select('id_kelas','nama_kelas','sensei.id_sensei','sensei.nama as wali_kelas')->distinct()
                    ->join('sensei','wali_kelas','=','id_sensei')
                    ->where('id_kelas','=',$id_sensei)
                    ->first();
            }catch (QueryException $e){
                $kelas=[];
            }
            return compact('siswa','kelas');
        } catch (QueryException $e) {
            return collect();
        }
    }
}
