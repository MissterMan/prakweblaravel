<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Author extends Model implements AuthenticatableContract
{
    use Authenticatable;
    use HasFactory;

    public function News()
    {
        return $this->hasMany(News::class);
    }
}
