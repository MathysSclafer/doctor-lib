<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class newAppointment extends Controller
{
    public function getpage()
    {
        $user = Auth::user();
        $appointments = Appointment::all();
        return view('appointment')->with(['user' => $user]);
    }
}
