<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class MataPelajaranModel extends Model
{
    use HasFactory;
    protected $table = 'mata_pelajaran';
    protected $primaryKey = 'id_mapel';
    protected $guarded = ['id_mapel'];
    protected $fillable = ['kode_mapel', 'nama_mapel', 'semester', 'tahun_ajaran', 'sensei_id'];

    public function kelas() {
        return $this->belongsToMany(KelasModel::class,'data_kelas','mapel_id','kelas_id');
    }
    public function sensei() {
        $this->belongsTo(SenseiModel::class, 'sensei_id', 'id_sensei');
    }

    public final function getMaPelSensei($id_sensei) {
        try {
            $dataMapel = DB::table('data_kelas')
                ->select('nama_kelas','kode_mapel', 'nama_mapel', 'semester', 'tahun_ajaran')
                ->join('mata_pelajaran','mapel_id','=','mata_pelajaran.id_mapel')
                ->join('kelas','kelas_id','=','id_kelas')
                ->where('mata_pelajaran.sensei_id','=',$id_sensei)
                ->orderBy('kode_mapel','ASC')
                ->paginate(6);
            return $dataMapel;
        }catch (QueryException $e){
            return collect();
        }
    }
}
