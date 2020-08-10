<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentType extends Model
{
    protected $guarded = [];

    public function categories() {
        return $this->hasMany(Category::class, 'content_type_id');
    }
}
