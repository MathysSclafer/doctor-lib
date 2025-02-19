@extends('layouts.app')


@section('content')
    <div class="flex flex-col px-5">
        @if(count($results) !== 1 && count($results) !== 0)
            <p>{{count($results)}} résulats trouvés</p>
        @else
            <p>{{count($results)}} résulat trouvé</p>
        @endif


        <div class="flex flex-wrap">
            @if(count($results) > 0)
                <ul class="pl-0 mb-0">
                    @foreach ($results as $result)
                        <div class="max-w-sm mx-auto bg-white shadow-md rounded-lg p-4 hover:shadow-lg transition-shadow duration-300">
                            <h2 class="text-lg font-bold text-gray-800">Dr. {{ $result->first_name }} {{ $result->name }}</h2>
                            <p class="text-sm text-blue-600 font-medium">{{ $result->speciality }}</p>

                            <div class="mt-2 space-y-1 text-gray-700 text-sm">
                                <p class="flex items-center">
                                    <svg class="w-4 h-4 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l3-3m0 0l3 3m-3-3V4m13 13a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ $result->city }}, {{ $result->area }}
                                </p>

                                <p class="flex items-center">
                                    <svg class="w-4 h-4 text-gray-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21V3"></path>
                                    </svg>
                                    Disponibilité : {{ $result->availability }}
                                </p>
                            </div>

                            <div class="mt-3">
                                <a href="#" class="block text-center bg-blue-500 text-white text-sm py-2 rounded-md font-medium hover:bg-blue-600 transition duration-300">
                                    Prendre Rendez-vous
                                </a>
                            </div>
                        </div>

                    @endforeach
                </ul>
            @else
                <p>Aucun résultat trouvé.</p>
        </div>
    @endif
    <div>
@endsection
