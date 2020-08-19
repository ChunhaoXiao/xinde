<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BasicArticle extends Model
{
    protected $fillable = ['article_id', 'content'];
}
