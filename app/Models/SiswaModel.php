<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
