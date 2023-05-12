<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- tailwind css --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <livewire:styles />
</head>
<body>
    <div id="app" >
        <div class="w-full bg-white shadow-lg">
            <div class="px-4 flex flex-wrap items-center justify-between">
                <div class="m-2">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{asset('images/logo.png')}}" alt="E-Annonce" class="h-12">
                    </a>
                </div>
                <div class="nav-item dropdown mr-8">
                    @auth
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#" >
                            Mon profile
                        </a>
                        <a class="dropdown-item" href="#" >
                            Mes annonces
                        </a>
                        <a class="dropdown-item" href="#" >
                            Mes informations
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            Déconnexion
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                    @endauth
                </div>
            </div>
        </div>

        <main>
            @yield('content')
        </main>
    </div>

    
    <livewire:scripts />
</body>
</html>
