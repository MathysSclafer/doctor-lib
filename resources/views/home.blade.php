@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>

                    @endif

                    {{ __('You are logged in!') }}

                </div>
                <form action="{{ route('appointment') }}">
                    <button type="submit">Prendre rendez-vous</button>
                </form>
            </div>
            <br>
            <div class="button">
                <form action="{{ route('schedule.index') }}">
                    <button type="submit">Gérer vos rendez-vous</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
