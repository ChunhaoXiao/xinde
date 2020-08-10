<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $guarded = [];

    public function collectionable() {
        return $this->morphTo();
    }
}
