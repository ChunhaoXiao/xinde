<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $withCount = [
        'articles'
    ];
    protected $guarded = [];

    public function articles() {
        return $this->hasMany(Article::class, 'category_id');
    }

    public function type() {
        return $this->belongsTo(ContentType::class, 'content_type_id');
    }
}
