@extends('layouts.app')
@section('content')
        <table>
            <thead>
            <tr>
                <th>Nom du Patient :</th>
                <th>Date :</th>
                <th>Heure de Début :</th>
                <th>Heure de Fin :</th>
                <th>Crée le :</th>
                <th>Modifié le :</th>
                <th></th>
            </tr>
            </thead>
            @foreach($schedules as $schedule)
                @if($schedule->doctor_id == '1')
                <tbody>
            <tr>
                <td>{{$schedule->patient_id}}</td>
                <td>{{$schedule->date}}</td>
                <td>{{$schedule->begin_time}}</td>
                <td>{{$schedule->end_time}}</td>
                <td>{{$schedule->created_at}}</td>
                <td>{{$schedule->updated_at}}</td>
            </tr>
            <td><a href="{{ route('schedule.delete', $schedule) }}">Annuler le rendez-vous</a></td>
            <td><a href="{{ route('schedule.update', $schedule) }}">Modifier le rendez-vous</a></td>
            </tbody>
                @endif
            @endforeach
        </table>
@endsection
