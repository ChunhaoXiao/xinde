<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $guarded = [];

    public function position() {
        return $this->belongsTo(AdvertisementPosition::class, 'position_id');
    }

    public function scopeValid($query) {
        //return $query->where('start_time', '<', now())->where('end_time', '>', now());
        return $query->where('end_time', '>', now())->orWhereNull('end_time');
    }
}
