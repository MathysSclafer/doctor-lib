@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center table">
    <table class="text-center table-bordered">
        <thead>
        <tr>
            <th> NOM DU PATIENT </th>
            <th> PRÉNOM DU PATIENT </th>
            <th> DATE </th>
            <th> HEURE </th>
            <th> TYPE </th>
        </tr>
        </thead>
        @foreach($appointments as $appointment)
            @if($appointment->doctor_id == Auth::id())
                <tbody>
                <tr>
                    <td>{{$appointment->patient_name}}</td>
                    <td>{{$appointment->patient_first_name}}</td>
                    <td>{{$appointment->date}}</td>
                    <td>{{$appointment->time}}</td>
                    <td>{{$appointment->type}}</td>
                    <td><a href="{{ route('manage.delete', $appointment) }}" class="btn-danger btn-sm">Annuler le rendez-vous</a></td>
                    <td><a href="{{ route('manage.update', $appointment) }}" class="btn-primary btn-sm">Modifier le rendez-vous</a></td>
                </tr>
                </tbody>
            @endif
        @endforeach
    </table>
    </div>
@endsection
