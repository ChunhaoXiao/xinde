<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(QuestionCategory::class, 'category_id');
    } 

    public function answers() {
        return $this->hasMany(Answer::class);
    }

    
}
