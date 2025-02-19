<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointment';

    public function user(){
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'date',
        'time',
        'patient_id',
        'doctor_id',
        'type',
    ];
}
