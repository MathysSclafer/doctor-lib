@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Auth::check())
                        <li class="nav-item">
                            <button type="submit">Prendre rendez-vous pour soi</button>

                        </li>
                        <li class="nav-item">
                            <button type="submit">Prendre rendez-vous pour un membre de sa famille<</button>

                        </li>
                    @else
                        {{__('Il faut se connecter')}}
                        <form action="{{ route('login') }}">
                            <button type="submit">Se connecter</button>
                        </form>

                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
