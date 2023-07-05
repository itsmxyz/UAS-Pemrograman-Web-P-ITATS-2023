<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_penilaian';
    protected $guarded = ['id_penilaian'];

    public final function deletePenilaianSiswaInKelas($nis_siswa, $id_kelas) {
        $this->where('siswa_nis',$nis_siswa)->where('kelas_id',$id_kelas)->delete();
    }
}
