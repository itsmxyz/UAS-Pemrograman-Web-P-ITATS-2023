<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKelasModel extends Model
{
    private $siswaModel, $kelaModel;
    use HasFactory;
    protected $table = 'data_kelas';

    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
        $this->kelaModel = new KelasModel();
    }
}
