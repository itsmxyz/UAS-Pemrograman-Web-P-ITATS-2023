<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LogAktivitasModel extends Model
{
    public final function insertLogSensei (array $input) {
        $query = DB::table('log_sensei')
            ->insert([
                'sensei_id' => $input['id_sensei'],
                'aktivitas' => $input['aktivitas'],
            ]);
    }
}
