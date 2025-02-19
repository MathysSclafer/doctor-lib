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
                    <a class="nav-link" href="{{ route('appointment') }}"></a>
                    <a class="nav-link" href="{{ route('appointmentForOther') }}">{{__('Prendre rendez-vous Autrui')}}</a>
                    <h3>{{__('Vous prenez rendez-vous pour vous :')}}</h3>
                    <form method ="POST" action="{{route('newAppointment')}}">

                        @csrf

                        <input type="hidden" id="patient_id" name="patient_id" value="{{$user->id}}">
                        <input type="hidden" id="patient_first_name" name="patient_first_name" value="{{$user->first_name}}">
                        <input type="hidden" id="patient_name" name="patient_name" value="{{$user->name}}">
                        <input type="hidden" id="doctor_id" name="doctor_id" value="{{$doctor->id }}">
                        <input type="hidden" id="patient_email" name="patient_email" value="{{$user->email}}">
                        <div class="row mb-3">

                            <label>{{__('Votre nom est : ')}}{{$user->first_name}}</label>
                            <label>{{__('Votre prénom est : ')}}{{$user->name}}</label>
                            <label>{{__('Vous avez : ')}}{{$user->age}}{{__(' ans')}}</label>
                            <label>{{__('Votre mail est :')}}{{$user->email}}</label>
                            <label>{{__('Votre rendez vous sera avec le docteur ')}}{{$doctor->name}}</label>


                        </div>

                        <div class="mb-3">
                            <label>{{__('Choisissez une date disponible')}}</label>
                            <select  id="schedule_id" name="schedule_id" >
                                <option value ="Nothing">
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
                                <option value ="Nothing">
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
                    {{__('Il faut se connecter')}}
                    <form action="{{ route('login') }}">
                        <button type="submit">Se connecter</button>
                    </form>

                    @endif
            </div>
        </div>
    </div>
</div>
@endsection
