@extends('layouts.app')
@section('content')
    <table>
        <thead>
        <tr>
            <th> Nom du Patient </th>
            <th> Prénom du Patient </th>
            <th> Date </th>
            <th> Heure </th>
        </tr>
        </thead>
        @foreach($appointments as $appointment)
                <tbody>
                <tr>
                    <td>{{$appointment->patient_name}}</td>
                    <td>{{$appointment->patient_first_name}}</td>
                    <td>{{$appointment->date}}</td>
                    <td>{{$appointment->time}}</td>
                </tr>
                <tr>
                <td><a href="{{ route('manage.delete', $appointment) }}">Annuler le rendez-vous</a></td>
                <td><a href="{{ route('manage.update', $appointment) }}">Modifier le rendez-vous</a></td>
                </tr>
                </tbody>
        @endforeach
    </table>
@endsection
