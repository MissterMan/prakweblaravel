<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'timestamps'];

    protected $fillable = [
        'news_title',
        'news_content',
        'news_slug',
        'excerpt',
        'category_id',
        'author_id'
    ];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Author()
    {
        return $this->belongsTo(Author::class);
    }
}
