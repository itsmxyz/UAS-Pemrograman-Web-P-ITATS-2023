<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
