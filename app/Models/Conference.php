<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    protected $guarded = [];

    protected $dates = [
        'start_date',
        'end_date',
        'enroll_begin_time',
        'enroll_end_time',
    ];
}
