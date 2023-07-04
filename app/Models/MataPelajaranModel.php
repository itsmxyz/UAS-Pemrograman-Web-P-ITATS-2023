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
            $dataMapel = DB::table('mata_pelajaran')
                ->select('kode_mapel', 'nama_mapel', 'semester', 'tahun_ajaran')
                ->where('sensei_id','=',$id_sensei)
                ->get();
            return $dataMapel;
        }catch (QueryException $e){
            return collect();
        }
    }
}
