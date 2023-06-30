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
                ->select('nis_siswa as nis_siswa','nama_siswa as nama_siswa',
                    'jenis_kelamin as jenis_kelamin','kelas.id_kelas','kelas.nama_kelas')
                ->join('kelas', 'kelas_id','=','kelas.id_kelas')
                ->orderBy('nis_siswa','ASC')
                ->paginate(15);
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
}
