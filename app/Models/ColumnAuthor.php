<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ColumnAuthor extends Model
{
    protected $guarded = [];

    protected $withCount = [
        'articles'
    ];

    public function articles() {
        return $this->hasMany(Article::class, 'column_author_id');
    }
}
