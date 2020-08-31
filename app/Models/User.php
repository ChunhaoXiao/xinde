<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($v) {
        $this->attributes['password'] = bcrypt($v);
    }

    public function comments() {
        return $this->hasMany(ArticleComment::class);
    }

    public function enrolls() {
        return $this->hasMany(ConferenceEnroll::class, 'user_id');
    }

    public function carts() {
        return $this->hasMany(Cart::class, 'user_id');
    }

    public function addresses() {
        return $this->hasMany(Address::class, 'user_id');
    }

    public function orders() {
        return $this->hasMany(Order::class, 'user_id');
    }

    public function temp_cart() {
        return $this->hasOne(TempCart::class, 'user_id');
    }

    public function goods_comments() {
        return $this->hasMany(GoodsComment::class, 'user_id');
    }
    //添加商品到购物车
    public function addToCart($goods_id, $quantity) {
        $cart = $this->carts()->where('goods_id', $goods_id)->first();
        if($cart) {
            return $cart->increment('quantity', $quantity);
        }
        return $this->carts()->create(['goods_id' => $goods_id, 'quantity' => $quantity]);
    }

    //查找用户
    public function scopeSearch($query, $data) {
        $data = array_filter($data, 'strlen');
        if(empty($data)) {
            return $query;
        }
        $fields = ['name', 'email', 'mobile'];
        foreach($data as $k => $v) {
            if(in_array($k, $fields)) {
                $query->where($k, $v);
            }
        }
        return $query;
    }
}
