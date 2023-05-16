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

    
</head>
<body>

@php
$role = Auth::user()->role;
@endphp

    <div id="app" >
        @include('partials.header')

        <div class="flex flex-row bg-gray-100 text-gray-700">
            <div class="flex flex-col w-2/12 bg-white py-6 overflow-hidden">
                @include('partials.sidebar')
              </div>
            <main class="main w-10/12 m-1 bg-gray-50  shadow-md p-3">
                @yield('content')
            </main>
            
        </div>
    </div>

    
   
</body>
</html>