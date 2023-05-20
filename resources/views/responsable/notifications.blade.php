@extends('layouts.app')

@section('content')
<div class="grid grid-cols-3 gap-4 mx-16">
    <a href="{{ route('newAnnonces') }}" class="text-center text-white font-bold no-underline">
        <div class="bg-green-900 hover:bg-green-800 py-2 px-2 shadow-md rounded-lg">
            <i class="fas fa-bullhorn fa-2x"></i>
            <h3 class="text-lg font-semibold mb-2">Nouveaux annonces</h3>
        </div>
    </a>

    <a href="{{ route('newInformations') }}" class="text-center text-white font-bold no-underline">
        <div class="bg-red-900 hover:bg-red-800 py-2 px-2 shadow-md rounded-lg">
            <i class="fas fa-info-circle fa-2x"></i>
            <h3 class="text-lg font-semibold mb-2">Nouveaux informations</h3>
        </div>
    </a>
  
    <a href="{{ route('newUsers') }}" class="text-center text-white font-bold no-underline">
        <div class="bg-blue-900 hover:bg-blue-800 py-2 px-2 shadow-md rounded-lg">
            <i class="fas fa-user-plus fa-2x"></i>
            <h3 class="text-lg font-semibold mb-2">Nouveaux utilisateurs</h3>
        </div>
    </a>
</div>

{{-- affichage des messages --}}
<div class="text-center">
    @if (session('message'))
        <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded relative session-alert" role="alert">
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif
    @if (session('error'))
        <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded relative session-alert" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif
</div>

<section>
    @if (Route::get('/home/new/announcements'))
        @yield('annonces')
    @endif
    @if (Route::get('/home/new/information'))
        @yield('information')
    @endif
    @if (Route::get('/home/new/users'))
        @yield('users')
    @endif
</section>
<script src="{{asset('/js/messageTimeSet.js')}}"></script>

@endsection
