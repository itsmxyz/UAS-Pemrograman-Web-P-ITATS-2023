<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SiswaModel extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $primaryKey = 'nis_siswa';
    protected $fillable = ['nama','jenis_kelamin'];
    protected $guarded = ['nis_siswa'];
    public final function kelas(): BelongsToMany
    {
        return $this->belongsToMany(KelasModel::class, 'data_kelas', 'siswa_nis', 'kelas_kode');
    }
    public final function absensi(): HasMany
    {
        return $this->hasMany(AbsensiModel::class, 'siswa_nis', 'nis_siswa');
    }
    public final function penilaian(): HasMany
    {
        return $this->hasMany(PenilaianModel::class, 'siswa_nis', 'nis_siswa');
    }
}
