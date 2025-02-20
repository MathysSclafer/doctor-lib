<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use App\Models\Appointment;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NewAppointmentController;
use Illuminate\Support\Facades\Mail;
use phpDocumentor\Reflection\Types\Null_;

class newAppointment extends Controller
{
    public function getpage($id_doctor)
    {
        $user = Auth::user();

        $doctor = User::find($id_doctor);
        $schedules = Schedule::where('doctor_id', $doctor->id)->whereNull('patient_id')->get();
        if(is_null($id_doctor)){
            return view('welcome');
        }
        elseif (is_null($schedules) || empty($schedules)) {
            return view('welcome');
        }
        elseif ($user -> id == $id_doctor) {
            return view('profil');
        }
        else{
            return view('appointment', compact('doctor','schedules','user'));
        }
    }

    public function otherAppointment($id_doctor)
    {
        $user = Auth::user();

        $doctor = User::find($id_doctor);
        $schedules = Schedule::where('doctor_id', $doctor->id)->whereNull('patient_id')->get();
        if(is_null($id_doctor)){
            return view('welcome');
        }
        elseif (is_null($schedules) || empty($schedules)) {
            return view('welcome');
        }
        else{
            return view('appointment', compact('doctor','schedules','user'));
        }
    }

    public function store(Request $request)
    {
        $scheduleId = $request->input('schedule_id');
        $type = $request->input('type');
        if($scheduleId == 'Nothing' || $type == 'Nothing')
        {
            $user = Auth::user();
            $doctor = User::find(1);
            $schedules = Schedule::where('doctor_id', $doctor->id)->where('patient_id', Null)->get();
            return view('appointment', compact('doctor','schedules','user'));}
        else{
            $schedule = Schedule::find($scheduleId);
            $schedule-> patient_id = $request -> patient_id;


            appointment::create([
                'date' => $schedule->date,
                'time' => $schedule->begin_time,
                'doctor_id'=> $request -> doctor_id,
                'patient_id'=> $request -> patient_id,
                'schedule_id'=> $schedule->id,
                'patient_name'=> $request -> patient_name,
                'patient_email'=> $request -> patient_email,
                'type'=> $type,
                'patient_first_name'=> $request -> patient_first_name,
            ]);

            $schedule->save();
            $doctor = User::find($request -> doctor_id);
            $this->sendEmailAppointment($doctor ->name, $request->type,$schedule->date,$schedule->begin_time,$request->patient_email);
            return redirect()->route('search')
                ->with('success', 'Vous avez pris rendez-vous pour le ' . \Carbon\Carbon::parse($schedule->date)->locale('fr')->isoFormat('dddd D MMMM') .
                    ' de ' . \Carbon\Carbon::parse($schedule->begin_time)->format('H\h00') .
                    " jusqu'à " . \Carbon\Carbon::parse($schedule->end_time)->format('H\h00') . " !");

        }

    }

    public function sendEmailAppointment($name_doctor, $type, $date, $start_time, $email ){
        $toEmail = $email;
        $message = 'Bonjour, votre rendez vous du '. $date . ' à '. $start_time .' avec le ' . $type . ' '. $name_doctor . ' est confirmé';
        $subject = 'Confirmation de votre rendez-vous';

        $reponse = mail::to($toEmail)->send(new WelcomeEmail($message, $subject));
    }


    protected function up(array $data)
    {

        return view('home');
    }


}

