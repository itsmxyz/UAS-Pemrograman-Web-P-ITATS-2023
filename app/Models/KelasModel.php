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

    public final function insertKelas(array $input): bool
    {
        try {
            $this->create([
                'kode_kelas' => $input['kode_kelas'],
                'nama' => $input['nama_kelas'],
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
