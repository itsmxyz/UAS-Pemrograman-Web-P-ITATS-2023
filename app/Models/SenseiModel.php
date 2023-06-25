<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class SenseiModel extends Model implements Authenticatable
{
    use HasFactory;
    protected $table = 'sensei';
    protected $primaryKey = 'id_sensei';
    protected $fillable = [ 'nama','username','password','kantor','sekretaris_id' ];
    protected $guarded = ['id_sensei'];

    public final function sekretaris(): BelongsTo {
        return $this->belongsTo(SekretarisModel::class, 'sekretaris_id', 'id_sekretaris');
    }
    public final function kelas(): HasOne {
        return $this->hasOne(KelasModel::class, 'sensei_id', 'id_sensei');
    }
    public final function getAll(): \Illuminate\Database\Eloquent\Collection|array {
        return $this->with('sekretaris')->get();
    }
    public final function insertSensei(array $validatedData):bool {
        try {
           $this->create([
               'nama' => $validatedData['nama'],
               'username' => $validatedData['username'],
               'password' => $validatedData['password'],
               'kantor' => $validatedData['kantor'],
               'sekretaris_id' => $validatedData['sekretaris'],
           ]);
        }catch (QueryException $e){
            return false;
        }
        return true;
    }
    public final function updateSensei(array $input):bool {
        try {
            $find = $this->find($input['id_sensei']);
            $find->update([
                'nama' => $input['nama'],
                'username' => $input['username'],
                'kantor' => $input['kantor'],
                'sekretaris_id' => $input['sekretaris'],
            ]);
        }catch (QueryException $e){
            return false;
        }
        return true;
    }
    public final function deleteSensei($input):bool {
        try {
            $find = $this->find($input);
            if (!$find){
                return false;
            }
            $find->delete();
        }catch (QueryException $e){
            return false;
        }
        return true;
    }
    public final function sameUsernameCheck(array $input):bool {
        $hasil = $this->find($input['id_sensei']);
        if ($hasil) {
            return $hasil->username === $input['username'];
        }
        else
            return false;
    }
    public final function listKantor(): Collection
    {
        try {
            $hasil = DB::table('sensei')
                ->distinct()
                ->pluck('kantor');
        } catch (QueryException $e) {
            $hasil = [];
        }
        return collect($hasil);
    }
    public final function jumlahSensei()
    {
        try {
            $jumlahSensei = DB::table('sensei')
                ->selectRaw('count(*) as jumlahSensei')
                ->first()
                ->jumlahSensei;
            return $jumlahSensei;
        }catch (QueryException $e){
            return -1;
        }
    }
    public function getAuthIdentifierName()
    {
        // TODO: Implement getAuthIdentifierName() method.
        return 'id_sensei';
    }
    public function getAuthIdentifier()
    {
        // TODO: Implement getAuthIdentifier() method.
        return $this->getKey();
    }
    public function getAuthPassword()
    {
        // TODO: Implement getAuthPassword() method.
        return $this->password;
    }
    public function getRememberToken()
    {
        // TODO: Implement getRememberToken() method.
        return $this->remember_token;
    }
    public function setRememberToken($value)
    {
        // TODO: Implement setRememberToken() method.
        $this->remember_token = $value;
    }
    public function getRememberTokenName()
    {
        // TODO: Implement getRememberTokenName() method.
        return 'remember_token';
    }
}
