<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends  Authenticatable
{
    protected $fillable = [
        'username', 'password', 'mobile'
    ];

    public function setPasswordAttribute($v) {
        $this->attributes['password'] = bcrypt($v);
    }
}
