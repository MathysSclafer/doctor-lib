<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScheduleRequest;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\TextUI\XmlConfiguration\UpdateSchemaLocation;

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
                'people' => $schedule->doctor_id,
                'start' => $schedule->date . ' ' . $schedule->begin_time,
                'end' => $schedule->date . ' ' . $schedule->end_time,
            ];
        });
        return view('schedule', compact('schedules'));
    }

    public function store(StoreScheduleRequest $data)
    {
        // Récupérer la date, l'heure de début et l'heure de fin
        $date = $data['date'];
        $beginTime = $data['begin_time'];
        $endTime = $data['end_time'];

        // Vérification des conflits d'horaires
        $conflict = Schedule::where('date', $date)
            ->where(function ($query) use ($beginTime, $endTime) {
                $query->where('begin_time', '<', $endTime)
                    ->where('end_time', '>', $beginTime);
            })
            ->exists();

        // Si un conflit est détecté
        if ($conflict) {
            return back()->withInput()->with('error', 'Les horaires sélectionnés se chevauchent avec un événement existant.');
        }

        // Si aucun conflit n'est trouvé, on crée le nouvel événement
        Schedule::create([
            'doctor_id' => Auth::id(),
            'date' => $date,
            'begin_time' => $beginTime,
            'end_time' => $endTime,
        ]);

        // Redirection avec un message de succès
        return redirect()->route('home')->with('success', 'L\'événement a été ajouté avec succès!');
    }



    public function getSchedule(){
       $schedules = Schedule::all();

       return compact('schedules');
    }
}
