<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedule';

    use HasFactory;

    public function doctor(){
        return $this->belongsTo(User::class, 'doctor_id');
    }

    protected $fillable = [
        'id',
        'doctor_id',
        'date',
        'begin_time',
        'end_time',
    ];

}
