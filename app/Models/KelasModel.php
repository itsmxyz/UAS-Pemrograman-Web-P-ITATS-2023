<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class KelasModel extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';
    public final function siswa(): BelongsToMany
    {
        return $this->belongsToMany(SiswaModel::class, 'data_kelas', 'kelas_id', 'siswa_id');
    }}
