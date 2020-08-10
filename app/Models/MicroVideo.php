<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MicroVideo extends Model
{
    protected $guarded = [];

    public function category() {
        return $this->belongsTo(MicroVideoCategory::class, 'category_id');
    }
}
