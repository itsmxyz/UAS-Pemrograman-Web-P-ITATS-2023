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
    protected $fillable = ['nama_siswa', 'jenis_kelamin'];

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
               'jenis_kelamin' => $input['jekel'],
               'kelas_id' => $input['id_kelas'],
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
}
