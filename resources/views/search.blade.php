@extends('layouts.app')

@php
    $count = 0;
    $user_id = 0;
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


                                <p class="flex items-center gap-2 !font-semibold">
                                    <i class="fa-solid fa-star"></i>
                                    @if($result->rating === null)
                                        Aucune note
                                    @else
                                        {{ number_format($result->rating, 2) }}
                                    @endif
                                </p>

                                <button class="btn-noter" data-id="{{ $result->id }}" data-toggle="modal" data-target="#modalAddSchedule">
                                    Noter
                                </button>



                                <p class="flex items-center gap-2 mb-0 !font-semibold">
                                    <i class="fa-solid fa-clock "></i>
                                    Disponibilité :
                                    <div class="flex flex-col">
                                    @foreach($schedules['schedules'] as $schedule)
                                        @if($schedule['calendarId'] === null)
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


        <div class="modal fade" id="modalAddSchedule" tabindex="-1" role="dialog" aria-labelledby="modalAddSchedule" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Créer une nouvelle horaire</h5>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('rating')}}" method="POST">
                            @csrf

                            <input type="">

                            <input type="text" name="search" value="{{$search}}">

                            <input class="" type="number" id="user_id_input" name="user_id" value="">


                            <label for="rating1" class="rate">
                                <input type="radio" id="rating1" name="rating" value="1" class="rate">
                                <i class="fa-solid fa-star"></i>
                            </label>

                            <label for="rating2" class="rate">
                                <input type="radio" id="rating2" name="rating" value="2" class="rate">
                                <i class="fa-solid fa-star"></i>
                            </label>

                            <label for="rating3" class="rate">
                                <input type="radio" id="rating3" name="rating" value="3" class="rate">
                                <i class="fa-solid fa-star"></i>
                            </label>

                            <label for="rating4" class="rate">
                                <input type="radio" id="rating4" name="rating" value="4" class="rate">
                                <i class="fa-solid fa-star"></i>
                            </label>

                            <label for="rating5" class="rate">
                                <input type="radio" id="rating5" name="rating" value="5" class="rate">
                                <i class="fa-solid fa-star"></i>
                            </label>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary">{{ __("Confirmer la note") }}</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
@endsection
