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
    protected $fillable = ['id_kelas','nama_kelas','wali_kelas'];

    public function siswa() {
        return $this->hasMany('siswa','kelas_id','id_kelas');
    }
    public function mataPelajaran(){
        return $this->belongsToMany(MataPelajaranModel::class, 'data_kelas','kelas,id','mapel_id');
    }
    public function getNamaKelas() {
        try {
            $kelas = DB::table('kelas')
                ->select('id_kelas','nama_kelas')
                ->where('id_kelas','!=','00000')
                ->get();
            return $kelas;
        }catch (QueryException $e){
            return collect();
        }
    }
    public function getJumlahKelas()
    {
        try {
            $jumlahKelas = DB::table('kelas')
                ->selectRaw('count(*) as jumlahKelas')
                ->first()
                ->jumlahKelas;
            return $jumlahKelas;
        }catch (QueryException $e){
            return 0;
        }
    }

    public final function insertKelas(array $input) {
        try {
            $this->create([
                'id_kelas' => $input['id_kelas'],
                'nama_kelas' => $input['nama_kelas'],
                'wali_kelas' => $input['wali_kelas'],
            ]);
            return true;
        }catch (QueryException $e){
            return false;
        }
    }

    public final function deleteKelas($id_kelas): bool {
        try {
            $siswaModel = new SiswaModel();
            $kelas = $this->findOrFail($id_kelas);
            $siswaModel->deleteSiswa(compact($id_kelas));
            $kelas->delete();
            return true;
        }catch (QueryException $e){
            return false;
        }
    }

    public final function getJumlahKelasbySensei($id_sensei){
        try {
            $jumlahKelas = DB::table('kelas')
                ->selectRaw('count(*) as jumlahKelas')
                ->where('wali_kelas','=',$id_sensei)
                ->first()
                ->jumlahKelas;
            return $jumlahKelas;
        }catch (QueryException $e){
            return 0;
        }
    }
}
