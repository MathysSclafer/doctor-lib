<?php

namespace App\Http\Controllers;

use App\Models\ManageAppointment;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ManageAppointmentController extends Controller
{
    public function index()
    {
        $appointments = ManageAppointment::orderBy('date', 'asc')->orderBy('time', 'asc')->get();

        return view('manageAppointment', compact('appointments'));
    }

    public function delete($appointment) {
        $deleteAppointment = ManageAppointment::find($appointment);

        $scheduleId = (int) $deleteAppointment->schedule_id;
        $schedule = Schedule::find($scheduleId);
        if ($schedule) {
            $schedule->patient_id = null;
            $schedule->save();
        }

        $deleteAppointment->delete();

        return redirect()->back();
    }

    public function update($appointment) {
        $modifyAppointment = ManageAppointment::find($appointment);

        return view('modifyAppointment', compact('modifyAppointment'));
    }

    public function saveUpdate(Request $request, $appointmentId)
    {
        $appointment = ManageAppointment::find($appointmentId);

        $appointment->update([
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'type' => $request->input('type'),
        ]);

        return redirect()->route('manage.index');
    }
}
