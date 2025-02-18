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
                            <a class="nav-link" href="{{ route('appointment') }}">{{__('Prendre rendez-vous pour soi')}}</a>
                            <a class="nav-link" href="{{ route('appointment') }}">{{__('Prendre rendez-vous Autrui')}}</a>
                        </li>
                    {{__('Vous prenez rendez vous pour')}}
                    {{$user->name}}
                    {{$user->firstname}}
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
