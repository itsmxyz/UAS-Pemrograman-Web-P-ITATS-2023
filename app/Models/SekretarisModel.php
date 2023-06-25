<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class SekretarisModel extends Model implements Authenticatable
{
    use HasFactory;
    protected $table = 'sekretaris';
    protected $primaryKey = 'id_sekretaris';
    protected $fillable = ['nama','username','password'];
    protected $guarded = ['id_sekretaris'];

    public final function sensei(): HasMany
    {
        return $this->hasMany(SenseiModel::class, 'sekretaris_id', 'id_sekretaris');
    }
    public final function getAll()
    {
        return $this->load('sensei')->get();
    }
    public final function insertSekretaris(array $validatedData):bool {
        try {
            $this->create([
                'nama' => $validatedData['nama'],
                'username' => $validatedData['username'],
                'password' => $validatedData['password'],
            ]);
            return true;
        }catch (QueryException $e){
            return false;
        }
    }
    public final function updateSekretaris(array $input):bool {
        try {
            $find = $this->findOrFail($input['id_sekretaris']);
            $find->update([
                'nama' => $input['nama'],
                'username' => $input['username'],
            ]);
            return true;
        }catch (QueryException $e){
            return false;
        }
    }
    public final function deleteSekretaris($input):bool {
        try {
            $find = $this->findOrFail($input);
            $find->delete();
            return true;
        }catch (QueryException $e){
            return false;
        }
    }
    public final function sameUsernameCheck(array $input):bool {
        $hasil = $this->find($input['id_sekretaris']);
        if ($hasil) {
            return $hasil->username === $input['username'];
        }
        else
            return false;
    }
    public final function jumlahSekretaris()
    {
        try {
            $jumlahSekretaris = DB::table('sekretaris')
                ->selectRaw('count(*) as jumlahSekretaris')
                ->first()
                ->jumlahSekretaris;
            return $jumlahSekretaris;
        }catch (QueryException $e){
            return 0;
        }
    }
    public final function namaSekretaris(): Collection
    {
        try {
            $hasil = DB::table('sekretaris')
                ->select('id_sekretaris', 'nama')
                ->get();
        }catch (QueryException $e){
            $hasil = [];
        }
        return collect($hasil);
    }
    public function getAuthIdentifierName()
    {
        // TODO: Implement getAuthIdentifierName() method.
        return 'id_sekretaris';
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
