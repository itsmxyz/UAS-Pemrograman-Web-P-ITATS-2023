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
    public final function getAllKelasBySenseiID($id_sensei) {
        try {
            $dataKelas = DB::table('kelas')
                ->select('id_kelas','nama_kelas','sensei.nama as wali_kelas')
                ->join('sensei','wali_kelas','=','sensei.id_sensei')
                ->where('wali_kelas','=',$id_sensei)
                ->orderBy('nama_kelas','ASC')
                ->paginate(6);
            return $dataKelas;
        }catch (QueryException $e) {
            return collect();
        }
    }
    public final function getDataMapelBySensei($kode_mapel,$id_kelas) {
        $id_mapel = DB::table('mata_pelajaran')
            ->where('kode_mapel','=',$kode_mapel)
            ->value('id_mapel');

        try {
            $mapel = DB::table('data_kelas')
                ->select('mata_pelajaran.nama_mapel', 'mata_pelajaran.kode_mapel', 'kelas.nama_kelas', 'mata_pelajaran.tahun_ajaran')
                ->join('kelas', 'kelas_id', '=', 'kelas.id_kelas')
                ->join('mata_pelajaran', 'mapel_id', '=', 'mata_pelajaran.id_mapel')
                ->where('mata_pelajaran.id_mapel', '=', $id_mapel)
                ->where('kelas.id_kelas', '=', $id_kelas)
                ->first();

            $siswa = DB::table('siswa')
                ->select('siswa.nis_siswa', 'siswa.nama_siswa', 'siswa.jenis_kelamin',
                    'absensi.*', 'penilaian.*')
                ->join('absensi', 'siswa.nis_siswa', '=', 'absensi.siswa_nis')
                ->leftJoin('siswa as absensi_siswa', 'absensi.siswa_nis', '=', 'absensi_siswa.nis_siswa')
                ->leftJoin('penilaian', 'siswa.nis_siswa', '=', 'penilaian.siswa_nis')
                ->leftJoin('siswa as penilaian_siswa', 'penilaian.siswa_nis', '=', 'penilaian_siswa.nis_siswa')
                ->where('absensi.mapel_id', '=', $id_mapel)
                ->orderBy('siswa.nama_siswa')
                ->get();

            return compact('mapel','siswa');
        }catch (QueryException $e){
            return collect();
        }
    }
}
