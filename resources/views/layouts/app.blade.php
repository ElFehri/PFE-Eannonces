<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!--Icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'])


    <script src="{{ asset('/ckeditor5/ckeditor.js') }}"></script>

</head>
<body>

@php
    $role = Auth::user()->role;
@endphp

<div id="app">
    @include('partials.header')

    <div class="flex flex-row bg-gray-100 text-gray-700">
        <div class="flex flex-col h-screen w-2/12 bg-white py-6 overflow-hidden">
            @include('partials.sidebar')
        </div>
        <main class="main flex-1 bg-gray-100 p-3">
            @yield('content')
        </main>
    </div>
</div>


    
    @yield('scripts')
</body>
</html>
