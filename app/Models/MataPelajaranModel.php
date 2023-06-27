<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MataPelajaranModel extends Model
{
    use HasFactory;
    protected $table = 'mata_pelajaran';
    protected $primaryKey = 'kode_mapel';
    protected $guarded = ['id_mapel'];
    protected $fillable = ['kode_mapel', 'nama_mapel', 'sensei_id'];
    public function sensei()
    {
        return $this->belongsTo(SenseiModel::class);
    }

    public function kelas()
    {
        return $this->belongsToMany(KelasModel::class, 'kelas_mata_pelajaran',
            'kelas_id', 'mapel_id');
    }

    public function absensi(): HasMany
    {
        return $this->hasMany(AbsensiModel::class, 'mapel_id', 'id_mapel');
    }

    public function penilaian(): HasMany
    {
        return $this->hasMany(PenilaianModel::class, 'mapel_id', 'id_mapel');
    }
}
