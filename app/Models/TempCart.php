<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TempCart extends Model
{
    protected $fillable = [
        'user_id',
        'goods_id',
        'quantity',
    ];

    public function goods() {
        return $this->belongsTo(Goods::class, 'goods_id');
    }

    public function getTotalPrice() {
        return $this->goods->price * $this->quantity;
    }
}
