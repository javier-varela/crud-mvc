<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'title', 'slug'];

    public $timestamps = false;

    function post()
    {
        return $this->hasMany(Post::class);
    }
}
