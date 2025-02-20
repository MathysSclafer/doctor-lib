<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\ManageAppointment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schedule;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $schedules = \App\Models\Schedule::where('doctor_id', Auth::id())->get()->map(function($schedule){
            if ($schedule->patient) {
                $patient_id = $schedule->patient->id;
            } else {
                $patient_id = null;
            }
            return [
                'id' => $schedule->id,
                'title' => '',
                'people' => $schedule->doctor->name,
                'location' => $schedule->doctor->city,
                'start' => $schedule->date . ' ' . $schedule->begin_time,
                'end' => $schedule->date . ' ' . $schedule->end_time,
                'calendarId' => $patient_id,
            ];
        });


        $allUser = User::all();

        $appointments = ManageAppointment::orderBy('date', 'asc')->orderBy('time', 'asc')->get();

        return view('home', ['user_role' => Auth::user()->role,'schedules' => ['schedules' => $schedules],
            'appointments' => $appointments]);
    }

    }

