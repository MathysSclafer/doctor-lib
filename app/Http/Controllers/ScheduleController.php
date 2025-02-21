<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScheduleRequest;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use PHPUnit\TextUI\XmlConfiguration\UpdateSchemaLocation;

class ScheduleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $schedules = \App\Models\Schedule::all()->map(function($schedule){
            if ($schedule->patient) {
                $patient_id = $schedule->patient->id;
            } else {
                $patient_id = null;
            }
            return [
                'id' => $schedule->id,
                'title' => $schedule->doctor->first_name . ' ' . $schedule->doctor->name,
                'people' => $schedule->doctor->id,
                'location' => $schedule->doctor->city,
                'start' => $schedule->date . ' ' . $schedule->begin_time,
                'end' => $schedule->date . ' ' . $schedule->end_time,
                'calendarId' => $patient_id,
            ];
        });

        return view('schedule', ['schedules' => compact('schedules')]);
    }

    public function indexModify(Schedule $schedule)
    {
        $this->authorize('viewModify', $schedule);


        return view('schedule_modify', compact('schedule'));
    }


    public function store(StoreScheduleRequest $data)
    {

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
            return back()->withInput()->with('error', 'Les horaires
             sélectionnés se chevauchent avec un horaire existant.');
        }

        Schedule::create([
            'doctor_id' => Auth::id(),
            'date' => $date,
            'begin_time' => $beginTime,
            'end_time' => $endTime,
        ]);

        return redirect()->route('home')->with('success',
            'L\'événement a été ajouté avec succès!');
    }

    public function update(StoreScheduleRequest $data, Schedule $schedule)
    {
        $this->authorize('update', $schedule);

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
            return back()->with('error', 'Les horaires se chevauchent avec un autre événement.');
        }

        $schedule->update([
            'date' => $date,
            'begin_time' => $beginTime,
            'end_time' => $endTime,
        ]);

        return redirect()->route('schedule.index', ['schedule' => $schedule->id]);
    }

    public function delete(Schedule $schedule){

        $this->authorize('delete', $schedule);

        $schedule->delete();

        return redirect()->route('home')->with('success', 'Le rendez-vous a été supprimé avec succès.');
    }



    public function search(Request $request)
    {
        $search = $request->input('search');

        $users = User::where('role', 'medecin')
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                    ->orWhere('area', 'like', "%$search%")
                    ->orWhere('city', 'like', "%$search%")
                    ->orWhere('first_name', 'like', "%$search%");
            })
            ->get();

        // Récupere ID des utilisateurs trouvés
        $userIds = $users->pluck('id');

        $schedules = Schedule::whereIn('doctor_id', $userIds)
            ->orWhereIn('patient_id', $userIds)
            ->get()
            ->map(function ($schedule) {

                if ($schedule->patient) {
                    $patient_id = $schedule->patient->id;
                } else {
                    $patient_id = null;
                }
                return [
                    'id' => $schedule->id,
                    'title' => $schedule->doctor->first_name . ' ' . $schedule->doctor->name,
                    'people' => $schedule->doctor->id,
                    'location' => $schedule->doctor->city,
                    'start' => $schedule->date . ' ' . $schedule->begin_time,
                    'end' => $schedule->date . ' ' . $schedule->end_time,
                    'calendarId' => $patient_id,
                ];
            });

        return view('search', [
            'search' => $search,
            'results' => $users,
            'schedules' => compact('schedules'),
        ]);
    }


    public function showDoctor(User $doctor){

        $this->authorize('viewDoctor', $doctor);

        $schedules = \App\Models\Schedule::where('doctor_id', $doctor->id)->get()->map(function($schedule){
            if ($schedule->patient) {
                $patient_id = $schedule->patient->id;
            } else {
                $patient_id = null;
            }
            return [
                'id' => $schedule->id,
                'title' => $schedule->doctor->first_name . ' ' . $schedule->doctor->name,
                'people' => $schedule->doctor->id,
                'location' => $schedule->doctor->city,
                'start' => $schedule->date . ' ' . $schedule->begin_time,
                'end' => $schedule->date . ' ' . $schedule->end_time,
                'calendarId' => $patient_id,
            ];
        });

        return view('doctor', [
            'doctor' => $doctor,
            'schedules' => compact('schedules'),
        ]);
    }


}
