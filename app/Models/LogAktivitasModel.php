<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\String\u;

class LogAktivitasModel extends Model
{
    use HasFactory;
    protected $table = 'log_aktivitas';
    protected $primaryKey = 'id_log_aktivitas';
    protected $guarded = ['id_log_aktivitas'];

    public final function insertLog($aktivitas){
        if (Auth::guard('schale')->check()) {
            $userId = Auth::guard('schale')->id();
            $username = Auth::guard('schale')->user()->username;
            $userTipe = 'Admin';
        }
        elseif (Auth::guard('sensei')->check()) {
            $userId = Auth::guard('sensei')->id();
            $username = Auth::guard('sensei')->user()->username;
            $userTipe = 'Sensei';
        }
        elseif (Auth::guard('sekretaris')->check()) {
            $userId = Auth::guard('sekretaris')->id();
            $username = Auth::guard('sekretaris')->user()->username;
            $userTipe = 'Sekretaris';
        }

        DB::table('log_aktivitas')
            ->insert([
                'id_user' => $userId,
                'tipe_user' => $userTipe,
                'username' => $username,
            ]);
    }
}
