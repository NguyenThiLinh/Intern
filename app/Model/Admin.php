<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Admin extends Model implements JWTSubject , Authenticatable
{
    use AuthenticableTrait;
    protected $table = 'admin';

    protected $fillable = ['name','email','password'];

    public $timestamps = true;

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [
            
        ];
    }
}
