<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\QueryException;

class SiswaModel extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $primaryKey = 'nis_siswa';
    protected $fillable = ['nama_siswa','jenis_kelamin', 'kelas_id'];
    protected $guarded = ['nis_siswa'];
    protected $attributes = ['kelas_id' => 1000];
    public function kelas()
    {
        return $this->belongsTo(KelasModel::class, 'kelas_id','id_kelas');
    }

    public function absensi(): HasMany
    {
        return $this->hasMany(AbsensiModel::class, 'siswa_nis', 'nis_siswa');
    }

    public function penilaian(): HasMany
    {
        return $this->hasMany(PenilaianModel::class, 'siswa_nis', 'nis_siswa');
    }
    public final function insertSiswa(){
        try {
            SiswaModel::create([
                'nama_siswa' => 'Ushio Noa',
                'jenis_kelamin' => 'cewek',
            ]);
            dd('hey');
        }catch (QueryException $e){
            dd('aww');
            return false;
        }
    }
}
