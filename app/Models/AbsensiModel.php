<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiModel extends Model
{
    use HasFactory;
    protected $table = 'absensi';
    protected $primaryKey = 'id_absensi';
    public function siswa()
    {
        return $this->belongsTo(SiswaModel::class, 'siswa_nis', 'nis_siswa');
    }
    public function kelas()
    {
        return $this->belongsTo(KelasModel::class, 'kelas_kode', 'kode_kelas');
    }
}
