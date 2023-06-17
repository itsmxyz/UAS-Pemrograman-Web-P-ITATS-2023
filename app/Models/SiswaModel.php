<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SiswaModel extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    protected $fillable = ['nama','jenis_kelamin'];
    protected $guarded = ['id_siswa'];
    public final function kelas(): BelongsToMany
    {
        return $this->belongsToMany(KelasModel::class, 'data_kelas', 'siswa_id', 'kelas_id');
    }
    public final function getDataSiswa(){
        return $this->paginate(15);
    }
}
