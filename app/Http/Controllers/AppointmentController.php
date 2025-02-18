<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Appointment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class AppointmentController extends Controller
{

    protected function create(StoreAppointmentRequest $data){

        Appointment::create([
                'date' => $data['date'],
                'time' => $data['time'],
                'patient_id' => Auth::id(),
                'doctor_id' => $data['doctor_id'],
                'type' => $data['type'],
        ]);

        dd(Appointment::all());
    }
}
