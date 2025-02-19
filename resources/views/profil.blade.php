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
                        <div>
                            <h3>{{__('Profil section')}}</h3>
                            <div>
                                {{__('Votre nom est : ')}}{{$user->name}}
                            </div>
                            <div>
                                {{__('Votre prénom est : ')}}{{$user->first_name}}</label>
                            </div>
                            <div>
                                {{__('Vous avez : ')}}{{$user->age}}{{__(' ans')}}
                            </div>
                            <div>
                                {{__('Votre mail est :')}}{{$user->email}}</label>
                            </div>
                        </div>
                    </div>
                <div class="row justify-content-center">
                    <div class="card">
                        <div>
                            <h3>{{__('Changer Information')}}</h3>
                            <div class="row mb-3">
                                <form action="{{route('change_name')}}" method ="POST">
                                    @csrf
                                    <label>{{__('Changer le nom_de_famille')}}</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name">
                                    <button type="submit" class="btn btn-primary">Valider</button>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </form>
                            </div>
                            <div>
                                <form action="{{route('change_first_name')}}" method ="POST">
                                    @csrf
                                    <label>{{__('Changer le prénom')}}</label>
                                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" required autocomplete="first_name">
                                    <button type="submit" class="btn btn-primary">Valider</button>

                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </form>
                            </div>
                            <div>
                                <form action="{{route('change_age')}}" method ="POST">
                                    @csrf
                                    <label>{{__('Changer l\'âge')}}</label>
                                    <input id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age" required autocomplete="age">
                                    <button type="submit" class="btn btn-primary">Valider</button>

                                    @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </form>
                            </div>
                            <div class="row mb-3">
                                <form action="{{route('change_email')}}" method ="POST">
                                    @csrf
                                    <label>{{__('Adresse email')}}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    <button type="submit" class="btn btn-primary">Valider</button>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </form>
                            </div>
                            <div>
                                @if($user->role == "medecin")
                                    <form action="{{route('devCli')}}" method ="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Devenir client</button>
                                    </form>
                                @else
                                    <form action="{{route('devMed')}}" method ="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Devenir médecin</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                        </div>
                        @else
                            {{__('Il faut se connecter')}}
                            <form action="{{ route('login') }}">
                                <button type="submit">Se connecter</button>
                            </form>
                            @endif
                        </div>

            </div>
        </div>
@endsection
