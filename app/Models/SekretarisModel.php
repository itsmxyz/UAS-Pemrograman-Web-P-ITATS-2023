<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    public final function getNamaSekretaris()
    {
        return $this->select('id_sekretaris','nama')->get();
    }
    public final function register($validatedData)
    {
        $this->create($validatedData);
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
