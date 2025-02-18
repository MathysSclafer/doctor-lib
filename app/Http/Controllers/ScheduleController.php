<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index() {
        $schedules = Schedule::all();
        return view('schedule', compact('schedules'));
    }
}
