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
                <p class=" text-center">Vous ne prenez pas rendez-vous pour vous ?
                    <a class="hover:!text-blue-400 text-decoration-none" href="{{ route('appointmentForOther') }}">{{__('cliquez ici')}}</a>
                </p>
                <h3 class="text-center !font-black">
                    {{__('VOTRE RENDEZ-VOUS')}}</h3>
                <form method ="POST" action="{{route('newAppointment')}}">

                    @csrf

                    <input type="hidden" id="patient_id" name="patient_id" value="{{$user->id}}">
                    <input type="hidden" id="patient_first_name" name="patient_first_name" value="{{$user->first_name}}">
                    <input type="hidden" id="patient_name" name="patient_name" value="{{$user->name}}">
                    <input type="hidden" id="doctor_id" name="doctor_id" value="{{$doctor->id }}">
                    <input type="hidden" id="patient_email" name="patient_email" value="{{$user->email}}">
                    <div class="flex justify-center items-center">
                        <div class="grid grid-cols-2 gap-4 items-center mr-36 my-3">
                            <label class="text-gray-700 font-medium text-end">{{ __('Nom ') }}</label>
                            <span class="ring ring-gray-400 rounded-sm px-3 py-1 !bg-gray-200">{{$user->first_name}}</span>

                            <label class="text-gray-700 font-medium text-end">{{ __('Prénom ') }}</label>
                            <span class="ring ring-gray-400 rounded-sm px-3 py-1 !bg-gray-200">{{$user->name}}</span>

                            <label class="text-gray-700 font-medium text-end">{{ __('Age ') }}</label>
                            <span class="ring ring-gray-400 rounded-sm px-3 py-1 !bg-gray-200">{{$user->age}}</span>

                            <label class="text-gray-700 font-medium text-end">{{ __('Adresse mail ') }}</label>
                            <span class="ring ring-gray-400 rounded-sm px-3 py-1 !bg-gray-200">{{$user->email}}</span>

                            <label class="text-gray-700 font-medium text-end">{{ __('Docteur ') }}</label>
                            <span class="ring ring-gray-400 rounded-sm px-3 py-1 !bg-gray-200">{{$doctor->name . ' ' . $doctor->first_name}}</span>
                        </div>
                    </div>



                    <div class="mb-3 flex justify-center items-center gap-3">
                        <label class="font-medium m-0">{{__('Date')}}</label>
                        <select class=" rounded-full bg-blue-300 px-2 py-1" id="schedule_id" name="schedule_id" >
                            <option value ="Nothing">
                                {{ __('Sélectionner une date') }}
                            </option>
                            @foreach($schedules as $possibleDate)
                                <option value="{{ $possibleDate->id }}">
                                    {{ $possibleDate->date }}{{ __(' à ') }}{{ $possibleDate->begin_time }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 flex justify-center items-center gap-3">
                        <label>{{__('Description')}}</label>
                        <textarea class="ring rounded-lg" name="type" required id="type">

                        </textarea>
                    </div>
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Valider le rendez-vous') }}
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
@endsection
