<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class admin extends Authenticatable implements JWTSubject
{
    use HasFactory;

    public $fillable=["name","email","password","created_at"];

    public function getJWTCustomClaims()
    {

        return [];

    }

    public function getJWTIdentifier()
    {

        return $this->getKey();

    }

}
