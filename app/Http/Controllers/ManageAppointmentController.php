<?php

namespace App\Http\Controllers;
use App\Models\ManageAppointment;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;

class ManageAppointmentController extends Controller
{
    public function index()
    {
        $allUser = User::all();

        $appointments = ManageAppointment::orderBy('date', 'asc')->orderBy('time', 'asc')->get();

        return view('manageAppointment', compact('appointments', 'allUser'));
    }

    public function finished($appointment)
    {
        $deleteAppointment = ManageAppointment::find($appointment);
        $deleteAppointment->delete();

        $scheduleId = $deleteAppointment->schedule_id;

        $deleteSchedule = Schedule::find($scheduleId);
        $deleteSchedule->delete();

        return redirect()->back();
    }

    public function delete($appointment)
    {
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

    public function update($appointment)
    {
        $this->authorize('viewAny', ManageAppointment::class);

        $modifyAppointment = ManageAppointment::find($appointment);

        return view('modifyAppointment', compact('modifyAppointment'));
    }

    public function saveUpdate(Request $request, $appointmentId)
    {
        $this->authorize('viewAny', ManageAppointment::class);

        $appointment = ManageAppointment::find($appointmentId);

        $appointment->update([
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'type' => $request->input('type'),
        ]);

        return redirect()->route('admin');
    }
}
