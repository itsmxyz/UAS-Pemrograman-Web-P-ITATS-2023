<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiModel extends Model
{
    use HasFactory;
    protected $table = 'absensi';
    protected $primaryKey = 'id_absensi';
    protected $guarded = ['id_absensi'];

    public final function deleteAbsensiSiswaInKelas($nis_siswa, $id_kelas) {
        $this->where('siswa_nis','=',$nis_siswa)->where('kelas_id','=',$id_kelas)->delete();
    }
}
