@extends('layouts.app')

@php
    $count = 0;
@endphp


@section('content')
    <div class="flex flex-col pl-5 pr-4">
        @if(count($results) !== 1 && count($results) !== 0)
            <p>{{count($results)}} résulats trouvés</p>
        @else
            <p>{{count($results)}} résulat trouvé</p>
        @endif


        <div class="flex gap-4">
            @if(count($results) > 0)
                <ul class="pl-0 mb-0 flex flex-col gap-3 font-quicksand">
                    @foreach ($results as $result)
                        <div class="max-w-sm mx-auto bg-white shadow-md rounded-xl p-4 hover:shadow-xl transition-shadow duration-300">
                            <h2 class="text-lg !font-bold text-gray-800 ">Dr {{ $result->first_name }} {{ $result->name }}</h2>
                            <p class="text-sm text-blue-600 font-medium">{{ $result->speciality }}</p>

                            <div class="mt-2 space-y-1 text-gray-700 text-sm">
                                <p class="flex items-center gap-2 !font-semibold">
                                    <i class="fa-solid fa-location-dot"></i>
                                    {{ $result->city }}, {{ $result->area }}
                                </p>


                                <p class="flex items-center gap-2 mb-0 !font-semibold">
                                    <i class="fa-solid fa-clock "></i>
                                    Disponibilité :
                                    <div class="flex flex-col">
                                    @foreach($schedules['schedules'] as $schedule)
                                        @if($schedule['calendarId'] == $result->id)
                                            <a href="" class="!font-semibold">
                                                {{ $schedule['start'] }} <br>
                                            </a>

                                            @php
                                                $count++;
                                            @endphp

                                            @if($count >= 5)
                                                @break
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                                </p>
                            </div>

                            <div class="mt-3">
                                <a href="{{route('doctor', $result->id)}}" class="block text-center text-decoration-none !bg-blue-500 text-white text-sm py-2 rounded-md font-medium hover:!bg-blue-600 transition duration-300">
                                    Prendre Rendez-vous
                                </a>
                            </div>
                        </div>

                    @endforeach
                </ul>

                <div class="calendar w-5/6"></div>

            @else
                <p>Aucun résultat trouvé.</p>
        </div>
    @endif
    <div>
@endsection
