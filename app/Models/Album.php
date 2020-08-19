<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
        'article_id', 'images', 'content', 'max_width'
    ];

    protected $casts = [
        'images' => 'array'
    ];
}
