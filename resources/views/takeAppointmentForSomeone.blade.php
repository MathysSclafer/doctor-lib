@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Auth::check())
                        <a class="nav-link" href="{{ route('appointment',['id_doctor' => $doctor->id]) }}"></a>
                        <h3>{{__("Vous prenez rendez-vous pour quelqu'un d'autre :")}}</h3>
                        <form method ="POST" action="{{route('newAppointment')}}">

                            @csrf

                            <input type="hidden" id="patient_id" name="patient_id" value="{{$user->id}}">
                            <input type="hidden" id="doctor_id" name="doctor_id" value="{{$doctor->id }}">
                            <div class="row mb-3">
                                <label>{{__('Nom')}}</label>
                                <input id="patient_name" type="text" class="form-control @error('patient_name') is-invalid @enderror" name="patient_name" required autocomplete="patient_name">
                            </div>
                            <div class="row mb-3">
                                <label>{{__('Prénom')}}</label>
                                <input id="patient_first_name" type="text" class="form-control @error('patient_first_name') is-invalid @enderror" name="patient_first_name" required autocomplete="patient_first_name">
                            </div>
                            <div class="row mb-3">
                                <label>{{__('Age')}}</label>
                                <input id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age" required autocomplete="age">
                            </div>
                            <div class="row mb-3">
                                <label>{{__('Adresse email')}}</label>
                                <input id="patient_email" type="patient_email" class="form-control @error('email') is-invalid @enderror" name="patient_email" value="{{ old('email') }}" required autocomplete="patient_email">
                            </div>
                            <div class="row mb-3">
                                <label>{{__('Votre rendez vous sera avec le docteur ')}}{{$doctor->name}}</label>
                            </div>

                            <div class="mb-3">
                                <label>{{__('Choisissez une date disponible')}}</label>
                                <select  id="schedule_id" name="schedule_id" >
                                    <option value="Nothing">
                                        {{ __('--------------------Date disponnible--------------------') }}
                                    </option>
                                    @foreach($schedules as $possibleDate)
                                        <option value="{{ $possibleDate->id }}">
                                            {{ $possibleDate->date }}{{ __(' à ') }}{{ $possibleDate->begin_time }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>{{__('Choisissez une type de rendez-vous')}}</label>
                                <select id="type" name="type" required>
                                    <option value="Nothing">
                                        {{ __('--------------------Type de rendez-vous--------------------') }}
                                    </option>
                                    <option id="type" value="Standard">
                                        {{ __('Rendez-vous normal')}}
                                    </option>
                                    <option id="type" value="Urgent">
                                        {{ __('Rendez-vous urgent')}}
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Prendre le rendez_vous') }}
                                </button>
                            </div>
                        </form>
                    @else
                        {{ route('login') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
