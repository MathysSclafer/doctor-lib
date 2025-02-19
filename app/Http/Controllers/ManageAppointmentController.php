<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ManageAppointmentController extends Controller
{

    public function index()
    {
        $appointments = Appointment::all();
        return view('manageAppointment', compact('appointments'));
    }

    public function delete($appointment) {
        $appointmentItem = Appointment::find($appointment);

        $appointmentItem->delete();

        return redirect()->back();
    }

    public function update($appointment) {
        $appointmentItem = Appointment::find($appointment);

        $appointmentItem->update();
    }
}
