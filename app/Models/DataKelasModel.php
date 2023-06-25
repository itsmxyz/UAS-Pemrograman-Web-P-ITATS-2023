<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
class DataKelasModel extends Model
{
    private $siswaModel, $kelaModel;
    use HasFactory;
    protected $table = 'data_kelas';

    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
        $this->kelaModel = new KelasModel();
    }
    public final function insertSiswaToKelas(array $input): bool
    {
        try {
            $this->create([
                'kelas_kode' => $input['kode_kelas'],
                'siswa_nis' => $input['nis_siswa'],
            ]);
            return true;
        }catch (QueryException $e){
            return false;
        }
    }
    public final function deleteSiswaFromKelas(array $input): bool
    {
        try {
            DB::table('data_kelas')
                ->where('kelas_kode', $input['kode_kelas'])
                ->where('siswa_nis', $input['nis_siswa'])
                ->delete();
            return true;
        }catch (QueryException $e){
            return false;
        }
    }
    public final function getDaftarKelas($idSensei): Collection{
        try {
            $daftarKelas = DB::table('kelas')
                ->join('sensei')
                ->on('kelas.sensei_id', '=', 'sensei.id_sensei')
                ->where('sensei.id_sensei', $idSensei)
                ->select('kode_kelas as kode_kelas', 'nama as nama_kelas', 'mata_pelajaran as mata_pelajaran')
                ->get();
            return collect($daftarKelas);
        }catch (QueryException $e){
            return collect();
        }
    }
    public final function getDataKelas($kodeKelas) :Collection
    {
        try {
            $dataKelas = $this->kelaModel
                ->with('sensei', 'siswa', 'siswa.absensi', 'siswa.penilaian')
                ->where('kode_kelas', $kodeKelas)
                ->first();
            return collect($dataKelas);
        }catch (QueryException $e) {
            return collect();
        }
    }
    public final function updatePenilaian(array $inputNilai)
    {
        $dataPenilaian = [];
        for ($i = 1; $i <= 8; $i++) {
            $dataPenilaian['penilaian'.$i] = $inputNilai['nilai'.$i];
        }

        DB::table('penilaian')
            ->where('kelas_kode', $inputNilai['kelas_kode'])
            ->where('siswa_nis', $inputNilai['siswa_nis'])
            ->update($dataPenilaian);
    }
    public final function updateAbsensi(){
        $dataAbsensi = [];
        for ($i = 1; $i <= 14; $i++) {
            $dataAbsensi['absensi'.$i] = 'ABSENSI_'.$i;
        }
        DB::table('absensi')
            ->where('kelas_kode', 'KODE_KELAS')
            ->where('siswa_nis', 'NIS_SISWA')
            ->update($dataAbsensi);
    }
}
