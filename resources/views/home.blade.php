@extends('layouts.app')

@section('content')

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif




@if(Route::is('home'))
    <div class="max-w-4xl mx-auto mt-10">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <div>
                <h2 class="text-2xl font-semibold text-gray-800">{{ Auth::user()->first_name }} {{ Auth::user()->name }}</h2>
                <p class="text-gray-500">{{ Auth::user()->email }}</p>
                <span class="text-sm px-3 py-1 rounded-full text-white
                        {{ Auth::user()->role === 'medecin' ? 'bg-blue-500' : 'bg-green-500' }}">
                {{ ucfirst(Auth::user()->role) }}
            </span>
            </div>

            <div class="mt-6">
                <h3 class="text-lg font-semibold text-gray-700">Informations personnelles</h3>
                <div class="mt-2 space-y-2">
                    <p><span class="font-medium text-gray-600">Âge :</span> {{ Auth::user()->age }} ans</p>
                    <p><span class="font-medium text-gray-600">Profession :</span> {{ Auth::user()->job ?? 'Non renseignée' }}</p>
                    <p><span class="font-medium text-gray-600">Région :</span> {{ Auth::user()->area ?? 'Non renseignée' }}</p>
                    <p><span class="font-medium text-gray-600">Ville :</span> {{ Auth::user()->city ?? 'Non renseignée' }}</p>
                    <p><span class="font-medium text-gray-600">Note moyenne :</span> ⭐ {{ Auth::user()->rating ?? 'Aucune note' }}</p>
                </div>
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <a href="{{ route('profileSection') }}" class="!bg-blue-500 text-decoration-none !text-white duration-300 px-4 py-2 rounded-lg shadow-md hover:!bg-blue-600">
                    Modifier mon profil
                </a>
                @if($user_role === "medecin")
                    <a href="{{route('admin', ['id' => auth()->user()->id])}}"
                       class="!bg-lime-500 text-decoration-none !text-white duration-300 px-4 py-2 rounded-lg shadow-md hover:!bg-lime-600">
                        Panel Admin
                    </a>
                @endif
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="!bg-red-500 text-decoration-none !text-white duration-300 px-4 py-2 rounded-lg shadow-md hover:!bg-red-600">
                    Déconnexion
                </a>
            </div>
        </div>
    </div>
@endif


    @if(Route::is('admin'))
        <div class="container text-center mt-4">
            <h1 class="display-4 fw-bold text-bg-success">📅 Mes Patients</h1>
            <hr class="my-4">
        </div>

        @php
            $hasAppointments = false;
        @endphp

        @foreach($appointments as $appointment)
            @if($appointment->doctor_id == Auth::id())
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
                    <th class="p-3"> PATIENT </th>
                    <th class="p-3"> TYPE </th>
                    <th class="p-3"> DATE </th>
                    <th class="p-3"> HEURE </th>
                    <th class="p-3"> DESCRIPTION </th>
                    <th class="p-3"> </th>
                    <th class="p-3"> </th>
                    <th class="p-3"> </th>
                </tr>
                </thead>
                @foreach($appointments as $appointment)
                    @if($appointment->doctor_id == Auth::id())
                        <tbody>
                        <tr>
                            <td class="p-3 table-light">{{$appointment->patient_first_name}} {{$appointment->patient_name}} </td>
                            <td class="p-3 table-light">{{$appointment->type}}</td>
                            <td class="p-3 table-light">{{$appointment->date}}</td>
                            <td class="p-3 table-light">{{$appointment->time}}</td>
                            <td class="p-3 table-light">{{$appointment->description}}</td>
                            <td class="p-3 table-light"><a href="{{ route('manage.finished', $appointment) }}" class="btn-success btn-sm"> Terminé </a></td>
                            <td class="p-3 table-light"><a href="{{ route('manage.update', $appointment) }}" class="btn-primary btn-sm"> Modifier </a></td>
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
                <p class="lead text-muted">Vous n'avez aucun patients à venir.</p>
            </div>
        @endif
        <br><br>
        <div class="container text-center mt-4">
            <h1 class="display-4 fw-bold text-bg-primary">📅 Mes Horaires</h1>
            <hr class="my-4"><br>
        </div>

        <div class="calendar"></div>
    @endif

<div class="modal fade" id="modalAddSchedule" tabindex="-1" role="dialog" aria-labelledby="modalAddSchedule" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Créer une nouvelle horaire</h5>
            </div>
            <div class="modal-body">
                <form action="{{route('schedule.store')}}" method="POST">
                    @csrf


                    <div class="row mb-3">
                        <label for="date" class="col-md-4 col-form-label text-md-end">{{ __('Date') }}</label>

                        <div class="col-md-6">
                            <input id="dateSchedule" type="date" class="form-control @error('date') is-invalid @enderror" name="date" required>

                            @error('date')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="begin_time" class="col-md-4 col-form-label text-md-end">{{ __('Heure de début') }}</label>

                        <div class="col-md-6">
                            <input id="begin_time" type="time" class="form-control @error('begin_time') is-invalid @enderror" name="begin_time" required>

                            @error('begin_time')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="end_time" class="col-md-4 col-form-label text-md-end">{{ __('Heure de fin') }}</label>


                        <div class="col-md-6">
                            <input id="end_time" type="time" class="form-control @error('end_time') is-invalid @enderror" name="end_time" required>

                            @error('end_time')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">{{ __("Ajouter l'horaire") }}</button>
                    </div>
                    </form>
            </div>

        </div>
    </div>


    <form id="acount-form" action="{{ route('profileSection') }}" method="GET" class="d-none">
        @csrf
    </form>


    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
@endsection
