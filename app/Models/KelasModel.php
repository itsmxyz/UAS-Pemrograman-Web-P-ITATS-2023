<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class KelasModel extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $primaryKey = 'kode_kelas';
    protected $fillable = ['nama', 'mata_pelajaran', 'sensei_id'];
    protected $guarded = ['kode_kelas'];
    public final function siswa(): BelongsToMany
    {
        return $this->belongsToMany(SiswaModel::class, 'data_kelas', 'kelas_kode', 'siswa_nis');
    }
    public final function sensei()
    {
        return $this->belongsTo(SenseiModel::class, 'sensei_id', 'id_sensei');
    }
}
