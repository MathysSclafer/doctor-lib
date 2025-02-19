<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManageAppointment extends Model
{
    protected $table = 'appointment';

    public function user(){
        return $this->belongsTo(User::class);
    }
    protected $fillable = [
        'date',
        'time',
        'patient_id',
        'patient_name',
        'patient_first_name',
        'doctor_id',
        'type',
    ];
}
