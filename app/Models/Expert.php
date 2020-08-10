<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(QuestionCategory::class, 'category_id');
    }

    public function scopeVerified($query) {
        return $query->where('verified', 1);
    }

    public function scopeUnverified($query) {
        return $query->where('verified', 0);
    }
}
