@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Modifier le rendez-vous') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('appointment.modified', $modifyAppointment->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="date" class="form-label">{{ __('Date du rendez-vous') }}</label>
                                <input type="date" id="date" name="date" class="form-control" value="{{ $modifyAppointment->date }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="time" class="form-label">{{ __('Heure du rendez-vous') }}</label>
                                <input type="time" id="time" name="time" class="form-control" value="{{ $modifyAppointment->time }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="type" class="form-label">{{ __('Type de rendez-vous') }}</label>
                                <select id="type" name="type" class="form-control" required>
                                    <option value="Standard" {{ $modifyAppointment->type == 'Standard' ? 'selected' : '' }}>
                                        {{ __('Rendez-vous normal') }}
                                    </option>
                                    <option value="Urgent" {{ $modifyAppointment->type == 'Urgent' ? 'selected' : '' }}>
                                        {{ __('Rendez-vous urgent') }}
                                    </option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                {{ __('Mettre à jour le rendez-vous') }}
                            </button>
                        </form>

                        <a href="{{ route('manage.index') }}" class="btn btn-secondary w-100 mt-2">
                            {{ __('Annuler') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
