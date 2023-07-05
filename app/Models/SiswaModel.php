<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class SiswaModel extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $primaryKey = 'nis_siswa';
    protected $guarded = ['nis_siswa'];
    protected $fillable = ['nama_siswa', 'jenis_kelamin', 'kelas_id'];

    public function kelas() {
        return $this->belongsTo('kelas', 'kelas_id','id_kelas');
    }
    public function absensi() {
        return $this->hasMany(AbsensiModel::class,'siswa_nis','nis_siswa');
    }
    public function penilaian() {
        return $this->hasMany(PenilaianModel::class,'siswa_nis','nis_siswa');
    }

    public function getDataSiswa()
    {
        try {
            $dataSiswa = DB::table('siswa')
                ->select('nis_siswa','nama_siswa', 'jenis_kelamin',
                    'id_kelas','nama_kelas')
                ->join('kelas', 'kelas_id','=','kelas.id_kelas')
                ->orderBy('nis_siswa','ASC')
                ->paginate(20);
            return $dataSiswa;
        }catch (QueryException $e){
            return collect();
        }
    }
    public function getJumlahSiswa(){
        try {
            $jumlahSiswa = DB::table('siswa')
                ->selectRaw('count(*) as jumlahSiswa')
                ->first()
                ->jumlahSiswa;
            return $jumlahSiswa;
        }catch (QueryException $e){
            return 0;
        }
    }
    public final function insertNewSiswa(array $input): bool {
        try {
            $this->create([
               'nama_siswa' => $input['nama_siswa'],
               'jenis_kelamin' => $input['jenis_kelamin'],
               'kelas_id' => $input['kelas_id'],
            ]);
            return true;
        }catch (QueryException $e){
            return false;
        }
    }
    public final function updateSiswa(array $input): bool {
        try {
            $siswa = $this->findOrFail($input['nis_siswa']);
            $siswa->update([
                'nama_siswa' => $input['nama_siswa'],
                'jenis_kelamin' => $input['jekel'],
                'kelas_id' => $input['id_kelas'],
            ]);
            return true;
        }catch (QueryException $e){
            return false;
        }
    }
    public final function deleteSiswa($nis_siswa): bool {
        try {
            $siswa = $this->findOrFail($nis_siswa);
            $siswa->delete();
            return true;
        }catch (QueryException $e){
            return false;
        }
    }
    public final function deleteSiswaFromKelas ($nis_siswa, AbsensiModel $absensiModel, PenilaianModel $penilaianModel) {
        try {
            $id_kelas = DB::table('siswa')
                ->where('nis_siswa','=',$nis_siswa)
                ->value('kelas_id');

            $siswa = $this->findOrFail($nis_siswa);
            $siswa->update([
                'kelas_id' => '00000',
            ]);
            $absensiModel->deleteAbsensiSiswaInKelas($nis_siswa,$id_kelas);
            $penilaianModel->deletePenilaianSiswaInKelas($nis_siswa,$id_kelas);
            return true;
        }catch (QueryException $e){
            return false;
        }
    }
    public final function resetSiswaKelas ($id_kelas) {
        $this->whereIn('kelas_id',$id_kelas)->update([
            'kelas_id' => 00000
        ]);
    }
}
