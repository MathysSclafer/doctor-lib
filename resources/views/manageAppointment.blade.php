@extends('layouts.app')
@section('content')
            <div class="d-flex justify-content-center table">
            <table class="text-center table-bordered">
                <thead>
                <tr>
                    <th> PATIENT </th>
                    <th> COMMENTAIRE </th>
                    <th> DATE </th>
                    <th> HEURE </th>
                </tr>
                </thead>
                @foreach($appointments as $appointment)
                    @if($appointment->doctor_id == Auth::id())
                        <tbody>
                        <tr>
                            <td>{{$appointment->patient_first_name}} {{$appointment->patient_name}} </td>
                            <td>{{$appointment->type}}</td>
                            <td>{{$appointment->date}}</td>
                            <td>{{$appointment->time}}</td>
                            <td><a href="{{ route('manage.finished', $appointment) }}" class="btn-primary btn-sm"> Terminé </a></td>
                            <td><a href="{{ route('manage.update', $appointment) }}" class="btn-secondary btn-sm"> Modifier </a></td>
                            <td><a href="{{ route('manage.delete', $appointment) }}" class="btn-danger btn-sm"> Annuler </a></td>
                        </tr>
                        </tbody>
                    @endif
                @endforeach
            </table>
            </div>

            <div class="d-flex justify-content-center table">
                <table class="text-center table-bordered">
                    <thead>
                    <tr>
                        <th> DOCTEUR </th>
                        <th> COMMENTAIRE </th>
                        <th> DATE </th>
                        <th> HEURE </th>
                    </tr>
                    </thead>
                    @foreach($appointments as $appointment)
                        @if($appointment->patient_id == Auth::id())
                            <tbody>
                            <tr>
                                <td>Dr. {{$appointment->user->name}}</td>
                                <td>{{$appointment->type}}</td>
                                <td>{{$appointment->date}}</td>
                                <td>{{$appointment->time}}</td>
                                <td><a href="{{ route('manage.delete', $appointment) }}" class="btn-danger btn-sm"> Annuler </a></td>
                            </tr>
                            </tbody>
                    @endif
                    @endforeach
                </table>
            </div>
@endsection
