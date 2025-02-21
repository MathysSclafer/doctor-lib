@extends('layouts.app')
@section('content')

    @if (session('success'))
        <div class="alert alert-success text-center px-4 py-3 rounded-md bg-green-100 border border-green-400 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="container text-center mt-4">
        <h1 class="display-4 fw-bold text-bg-success">📅 Mes Rendez-vous</h1>
        <hr class="my-4">
    </div>

    @php
        $hasAppointments = false;
    @endphp

    @foreach($appointments as $appointment)
        @if($appointment->patient_id == Auth::id())
            @php
                $hasAppointments = true;
                break;
            @endphp
        @endif
    @endforeach

    @if($hasAppointments)
            <div class="d-flex justify-content-center table">
                <table class="table-bordered table-hover table-striped text-center align-middle">
                    <thead class="table-light">
                    <tr>
                        <th class="p-3"> DOCTEUR </th>
                        <th class="p-3"> COMMENTAIRE </th>
                        <th class="p-3"> DATE </th>
                        <th class="p-3"> HEURE </th>
                        <th class="p-3"> </th>
                    </tr>
                    </thead>
                    @foreach($appointments as $appointment)
                        @if($appointment->patient_id == Auth::id())
                            <tbody>
                            <tr>
                                <td class="p-3 table-light">Dr. {{$appointment->user->name}}</td>
                                <td class="p-3 table-light">{{$appointment->type}}</td>
                                <td class="p-3 table-light">{{$appointment->date}}</td>
                                <td class="p-3 table-light">{{$appointment->time}}</td>
                                <td class="p-3 table-light"><a href="{{ route('manage.delete', $appointment) }}" class="btn-danger btn-sm"> Annuler </a></td>
                            </tr>
                            </tbody>
                        @endif
                    @endforeach
                </table>
            </div>
    @else
        <br>
        <div class="container text-center mt-4">
        <p class="lead text-muted">Vous n'avez aucun Rendez-vous à venir.</p>
        </div>
    @endif
@endsection
