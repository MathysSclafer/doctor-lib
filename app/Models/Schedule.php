<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedule';

    protected $fillable = [
        'doctor_id',
        'date',
        'begin_time',
        'end_time',
    ];

}
