<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function News()
    {
        return $this->hasMany(News::class);
    }

    public function Bookapi()
    {
        return $this->hasMany(Bookapi::class);
    }
}
