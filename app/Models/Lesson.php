<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $guarded = [];

    public function category() {
        return $this->belongsTo(LessonCategory::class, 'category_id');
    }
}
