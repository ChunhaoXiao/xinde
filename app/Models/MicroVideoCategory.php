<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MicroVideoCategory extends Model
{
    protected $guarded = [];

    public function videos() {
        return $this->hasMany(MicroVideo::class, 'category_id');
    }
}
