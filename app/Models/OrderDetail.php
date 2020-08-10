<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $guarded = [];

    public function order() {
        return $this->belongsTo(User::class);
    }

    public function goods() {
        return $this->belongsTo(Goods::class);
    }
}
