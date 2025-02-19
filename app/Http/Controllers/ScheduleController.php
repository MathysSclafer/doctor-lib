<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScheduleRequest;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $schedules = \App\Models\Schedule::all()->map(function($schedule){
            return [
                'id' => $schedule->id,
                'title' => '',
                'people' => $schedule->doctor->name . ' ' . $schedule->doctor->first_name,
                'location' => $schedule->doctor->city,
                'start' => $schedule->date . ' ' . $schedule->begin_time,
                'end' => $schedule->date . ' ' . $schedule->end_time,
            ];
        });
        return view('schedule', ['schedules' => compact('schedules')]);
    }

    public function store(StoreScheduleRequest $data)
    {

        if (Auth::user()->role !== 'doctor'){
            return back()->with('error', 'Seuls les médecins sont autorisé a faire ca');
        }

        $this->authorize('create', Schedule::class);

        $date = $data['date'];
        $beginTime = $data['begin_time'];
        $endTime = $data['end_time'];

        $conflict = Schedule::where('date', $date)
            ->where(function ($query) use ($beginTime, $endTime) {
                $query->where('begin_time', '<', $endTime)
                    ->where('end_time', '>', $beginTime);
            })
            ->exists();

        if ($conflict) {
            return back()->withInput()->with('error', 'Les horaires sélectionnés se chevauchent avec un événement existant.');
        }

        Schedule::create([
            'doctor_id' => Auth::id(),
            'date' => $date,
            'begin_time' => $beginTime,
            'end_time' => $endTime,
        ]);

        dd(Schedule::all());

        return redirect()->route('home')->with('success', 'L\'événement a été ajouté avec succès!');
    }
}
