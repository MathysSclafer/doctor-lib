@extends('layouts.app')

@section('content')
    <div class="container flex justify-center">
        <div class="card font-quicksand font-semibold !rounded-2xl py-3 shadow-md">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @if (Auth::check())
                    <p class=" text-center">Vous prenez rendez-vous pour vous ?
                        <a class="hover:!text-blue-400 text-decoration-none" href="{{ route('appointment',['id_doctor' => $doctor->id])}}">{{__('cliquez ici')}}</a>
                    </p>
                <a class="nav-link" href="{{ route('appointment',['id_doctor' => $doctor->id]) }}"></a>
                <h3 class="text-center !font-black">{{__("VOTRE RENDEZ-VOUS")}}</h3>
                <form method ="POST" action="{{route('appointment')}}">
                    @csrf

                    <input type="hidden" id="patient_id" name="patient_id" value="{{$user->id}}">
                    <input type="hidden" id="doctor_id" name="doctor_id" value="{{$doctor->id }}">
                    <input type="hidden" id="type" name="type" value="{{$doctor->job}}">
                    <div class="flex justify-center items-center">
                        <div class="grid grid-cols-2 gap-4 items-center mr-36 my-3">
                            <label class="text-gray-700 font-medium text-end">{{ __('Nom ') }}</label>
                            <input id="patient_name" type="text" class="form-control @error('patient_name') is-invalid @enderror" name="patient_name" required autocomplete="patient_name">

                            <label class="text-gray-700 font-medium text-end">{{ __('Prénom ') }}</label>
                            <input id="patient_first_name" type="text" class="form-control @error('patient_first_name') is-invalid @enderror" name="patient_first_name" required autocomplete="patient_first_name">

                            <label class="text-gray-700 font-medium text-end">{{ __('Age ') }}</label>
                            <input id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age" required autocomplete="age">

                            <label class="text-gray-700 font-medium text-end">{{ __('Adresse mail ') }}</label>
                            <input id="patient_email" type="patient_email" class="form-control @error('email') is-invalid @enderror" name="patient_email" value="{{ old('email') }}" required autocomplete="patient_email">

                            <label class="text-gray-700 font-medium text-end">{{__('Votre rendez-vous sera avec le/la ')}}{{$doctor -> job}}{{__(' ')}}{{$doctor->name}}</label>
                        </div>
                    </div>

                    <div class="mb-3 flex justify-center items-center gap-3">
                        <label>{{__('Choisissez une date disponible')}}</label>
                        <select  class=" rounded-full bg-blue-300 px-2 py-1" id="schedule_id" name="schedule_id" >
                            <option value="Nothing">
                                {{ __('--------------------Date disponible--------------------') }}
                            </option>
                            @foreach($schedules as $possibleDate)
                                <option value="{{ $possibleDate->id }}">
                                    {{ $possibleDate->date }}{{ __(' à ') }}{{ $possibleDate->begin_time }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>{{__('Choisissez un type de rendez-vous')}}</label>
                        <select class=" rounded-full bg-red-300 px-2 py-1" id="description" name="description" required>
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
                <h1>{{__('Il faut se connecter')}}</h1>
                <form action="{{ route('login') }}">
                    <button type="submit" class="btn btn-primary">Se connecter</button>
                </form>
            @endif
        </div>
    </div>
@endsection
