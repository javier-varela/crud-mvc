<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'title', 'slug', 'description', 'content', 'image_url', 'published', 'category_id'];

    function category()
    {
        return $this->belongsTo(Category::class);
    }
}
