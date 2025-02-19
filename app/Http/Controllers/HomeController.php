<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
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
        $user_role = Auth::user()->role;

        $schedules = \App\Models\Schedule::all()->map(function($schedule){
            return [
                'id' => $schedule->id,
                'title' => '',
                'people' => $schedule->doctor->name,
                'location' => $schedule->doctor->city,
                'start' => $schedule->date . ' ' . $schedule->begin_time,
                'end' => $schedule->date . ' ' . $schedule->end_time,
            ];
        });
        return view('home', ['schedules' => compact('schedules'),'user_role' => $user_role]);
    }
}
