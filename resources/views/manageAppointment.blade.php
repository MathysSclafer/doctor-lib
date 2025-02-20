@extends('layouts.app')
@section('content')

    @if (session('success'))
        <div class="alert alert-success text-center px-4 py-3 rounded-md bg-green-100 border border-green-400 text-green-700">
            {{ session('success') }}
        </div>
    @endif

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
