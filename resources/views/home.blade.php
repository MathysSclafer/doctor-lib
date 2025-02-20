@extends('layouts.app')

@section('content')

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($user_role === "medecin")
        <div class="calendar mx-20"></div>
    @endif

<div class="modal fade" id="modalAddSchedule" tabindex="-1" role="dialog" aria-labelledby="modalAddSchedule" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Créer une nouvelle horaire</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
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
                    <form action="{{ route('schedule.index') }}">
                        <button type="submit">Gérer vos rendez-vous</button>
                    </form>
                </form>
                    {{ __('You are logged in!') }}

                </div>
                    <div class="button">
                        <form action="{{ route('appointment') }}">
                            <button type="submit">Prendre rendez-vous</button>
                        </form>
                    </div>
            </div>
            <br>

        </div>
    </div>
@endsection
