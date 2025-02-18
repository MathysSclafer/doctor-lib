<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/schedule.css') }}">



    <script src="https://cdn.jsdelivr.net/npm/preact@10.23.2/dist/preact.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/preact@10.23.2/hooks/dist/hooks.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@preact/signals-core@1.8.0/dist/signals-core.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@preact/signals@1.3.0/dist/signals.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/preact@10.23.2/jsx-runtime/dist/jsxRuntime.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/preact@10.23.2/compat/dist/compat.umd.js"></script>

    <script src="{{ asset('js/schedule.js')}}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@schedule-x/drag-and-drop@2.2.0/dist/core.umd.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@schedule-x/theme-default@2.2.0/dist/index.css">

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

    <script src="https://kit.fontawesome.com/1e46e56962.js" crossorigin="anonymous"></script>


</head>
<style>
    .font-quicksand{
        font-family: 'Quicksand', sans-serif;
    }
</style>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-white bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class=" navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @auth
                            @if(Route::is('/'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home') }}">{{ __('Votre profile') }}</a>
                                </li>
                            @endif
                        @endauth
                        @guest
                            @if (Route::has('login'))
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            @if(Route::is('home'))
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endif
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 ">
            @yield('content')
        </main>
    </div>
</body>
@if(Route::is('home') || Route::is('schedule'))
<script>

    let allSchedules = @json($schedules);
    console.log(allSchedules);

    const { createCalendar, createViewMonthAgenda, createViewMonthGrid } = window.SXCalendar;
    const { createDragAndDropPlugin } = window.SXDragAndDrop;
    const plugins = [
        createDragAndDropPlugin(),
    ]


    const calendar = createCalendar({
        views: [createViewMonthAgenda()],
        events: allSchedules,
    }, plugins)

    calendar.render(document.querySelector('.calendar'))


    $(document).ready(function () {
        // Lorsque le bouton est cliqué, on bascule l'état du modal
        $("button[data-target='#modalAddSchedule']").on("click", function () {
            $("#modalAddSchedule").modal('toggle'); // Toggle l'état d'ouverture/fermeture
        });
    });




</script>
@endif
</html>
