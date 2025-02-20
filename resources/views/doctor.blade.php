@extends('layouts.app')

@section('content')

    @if (session('success'))
        <div class="alert alert-success text-center px-4 py-3 rounded-md bg-green-100 border border-green-400 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="absolute top-9 left-10 cursor-pointer bg-blue-300 rounded-full py-2 px-3">
        <a href="{{url()->previous()}}"><i class="fa-solid fa-chevron-left"></i></a>
    </div>

    <h1 class="font-quicksand !text-4xl !font-bold text-center">
        Dr {{$doctor->first_name . ' ' . $doctor->name}}
    </h1>

    <p class="flex items-center justify-center gap-2 !font-semibold">
        <i class="fa-solid fa-location-dot"></i>
        {{ $doctor->city . ', ' . $doctor->area }}
    </p>

    <div class="calendar"></div>

@endsection
