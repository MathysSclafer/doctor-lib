<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedule';
    protected $fillable = [ 'patient_id', 'appointment_id', 'date', 'begin_time', 'end_time', 'is_free', 'created_at', 'updated_at' ];
}
