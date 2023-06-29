<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class KelasModel extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';
    protected $guarded = ['id_kelas'];
    protected $fillable = ['kode_kelas', 'nama_kelas'];

    public function siswa() {
        return $this->hasMany('siswa','kelas_id','id_kelas');
    }
    public function mataPelajaran(){
        return $this->belongsToMany(MataPelajaranModel::class, 'data_kelas','kelas,id','mapel_id');
    }
    public function getNamaKelas() {
        try {
            $kelas = DB::table('kelas')
                ->select('nama_kelas as nama_kelas')
                ->get();
            return collect($kelas);
        }catch (QueryException $e){
            return collect();
        }
    }
}
