@extends('layouts.app')


@section('content')

    @if(session('success'))
        <div class="alert alert-success mt-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex flex-col items-center justify-center">
        <h1 class="font-quicksand !font-bold !text-5xl text-center">
            Informations sur l'horaire du {{ \Carbon\Carbon::parse($schedule->date)->locale('fr')->isoFormat('dddd D MMMM') }}
        </h1>
        <h2>de {{ \Carbon\Carbon::parse($schedule->begin_time)->format('H\h00') }}
            jusqu'à {{ \Carbon\Carbon::parse($schedule->end_time)->format('H\h00') }}</h2>

        <div class="flex flex-col mt-10 items-center justify-center bg-white shadow-sm !py-8 px-6 w-9/12
        rounded-xl !ring ring-transparent transition duration-300 hover:ring-black/20 hover:shadow-xl">
            <h3 class="font-quicksand my-2">Modification de l'horaire</h3>
            <form action="" method="POST" class="w-full">
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

                <div class="flex justify-center mt-4">
                    <button type="submit" class="btn btn-primary !px-10">Valider</button>
                </div>

            </form>
        </div>

        <div class="flex gap-2 mt-10">
            <a href="{{route('home') }}" class="flex items-center justify-center py-1 px-3 text-white text-decoration-none duration-300 !bg-gray-400 hover:!bg-gray-500 rounded-sm">
                Retour
            </a>

            <form action="{{ route('schedule.delete', $schedule->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet horaire ?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>

        </div>

    </div>


@endsection
