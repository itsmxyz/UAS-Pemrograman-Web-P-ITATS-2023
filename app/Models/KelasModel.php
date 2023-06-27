<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\QueryException;

class KelasModel extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $primaryKey = 'kode_kelas';
    protected $fillable = ['nama_kelas', 'mata_pelajaran', 'sensei_id'];
    protected $guarded = ['kode_kelas'];

    public function siswa()
    {
        return $this->hasMany(SiswaModel::class, 'kelas_id', 'id_kelas');
    }

    public function mataPelajaran(): BelongsToMany
    {
        return $this->belongsToMany(MataPelajaranModel::class, 'kelas_mata_pelajaran',
            'kelas_id', 'mapel_id');
    }

    public final function insertKelas(array $input): bool
    {
        try {
            $this->create([
                'kode_kelas' => $input['kode_kelas'],
                'nama_kelas' => $input['nama_kelas'],
                'mata_pelajaran' => $input['mata_pelajaran'],
                'sensei_id' => $input['id_sensei'],
            ]);
            return true;
        } catch (QueryException $e){
            return false;
        }
    }
    public final function deleteKelas($kodeKelas){
        try {
            $find = $this->findOrFail($kodeKelas);
            $find->delete();
            return true;
        }catch (QueryException $e){
            return false;
        }
    }
}
