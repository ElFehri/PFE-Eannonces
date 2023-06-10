<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Welcome in E-annonce</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'])

    
</head>
<body class="leading-normal tracking-normal gradient" >
    <div id="app" class="">
        <div class="w-full bg-white shadow-sm fixed top-0 left-0 right-0 z-10">
            <div class="px-4 flex flex-wrap items-center justify-between">
                <div class="m-2">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{asset('images/logo.png')}}" alt="E-Annonce" class="h-12">
                    </a>
                </div>
                <div>
                @guest
                    @if (Route::has('login'))
                            <a class="font-bold text-white no-underline" href="{{ route('login') }}"><button class="btn btn-primary font-bold">{{ __('Se connecter') }}</button></a>
                    @endif
                    @if (Route::has('register'))
                        <a class="font-bold text-white no-underline" href="{{ route('register') }}"><button class="btn btn-primary ">{{ __("S'inscrire") }}</button></a>
                    @endif
                @else
                    <div class="nav-item dropdown">
                        @auth
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('home')}}" >
                                Dashboard
                            </a>
                            <a class="dropdown-item" href="{{route('profile')}}" >
                                Mon profile
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
                @endguest
                </div>
            </div>
        </div>

        <main class="">
            @yield('welcome')              
        </main>
    </div>

   
</body>
</html>
