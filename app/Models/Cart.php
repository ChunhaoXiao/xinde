<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = [];

    protected $with = [
        "goods"
    ];

    public function  goods() {
        return $this->belongsTo(Goods::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
