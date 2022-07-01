<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Author extends Model implements AuthenticatableContract, JWTSubject
{
    use Authenticatable;
    use HasFactory;

    public function News()
    {
        return $this->hasMany(News::class);
    }

    public function Bookapi()
    {
        return $this->hasMany(Bookapi::class);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
