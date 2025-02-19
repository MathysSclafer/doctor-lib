<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index() {
//        $this->authorize('viewAny', Schedule::class);
        $schedules = Schedule::all();
        return view('schedule', compact('schedules'));
    }

    public function delete($schedule) {
        $scheduleItem = Schedule::find($schedule);

        $scheduleItem->delete();

        return redirect()->back();
    }

    public function update($schedule) {
        $scheduleItem = Schedule::find($schedule);

        $scheduleItem->update();


    }
}
