<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{

    const TYPE = [
        '1' => '线上会议',
        '2' => '线下会议',
    ];

    protected $fillable = [
        'start_date', 'end_date', 'enroll_begin_time', 'enroll_end_time', 'address', 'introduction', 'content', 'conference_type'
    ];

    protected $dates = [
        'start_date',
        'end_date',
        'enroll_begin_time',
        'enroll_end_time',
    ];

    public function scopeComing($query) {
        return $query->where('start_date', '>', now())->oldest('start_date');
    }
}
