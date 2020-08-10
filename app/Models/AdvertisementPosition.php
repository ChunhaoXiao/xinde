<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdvertisementPosition extends Model
{
    protected $guarded = [];

    public function advertisement() {
        return $this->hasOne(Advertisement::class, 'position_id');
    }
}
