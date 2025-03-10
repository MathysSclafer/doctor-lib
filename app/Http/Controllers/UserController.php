<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRatingRequest;
use App\Models\ManageAppointment;
use App\Models\Rating;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Laravel\Prompts\search;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function storeNotation(StoreRatingRequest $data){

        Rating::create([
            'user_id' => $data['user_id'],
            'rating' => $data['rating'],
        ]);

        $this->updateNotation($data['user_id']);

        $patientsCount = User::all()->where('role', 'patient')->count();
        $medecinsCount = User::all()->where('role', 'medecin')->count();

        return view('welcome', compact('patientsCount', 'medecinsCount'));
    }

    public function updateNotation($doctor_id)
    {
        $averageRating = Rating::where('user_id', $doctor_id)->avg('rating');

        User::where('id', $doctor_id)->update(['rating' => $averageRating]);
    }

    public function adminIndex(){

        $this->authorize('viewAdmin', User::class);

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

        return view('home', ['user_role' => Auth::user()->role,
            'schedules' => ['schedules' => $schedules],
            'appointments' => $appointments]);
    }
}
