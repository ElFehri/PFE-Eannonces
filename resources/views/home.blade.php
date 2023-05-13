@extends('layouts.app')

@section('content')
@livewireStyles

@php
    $role = Auth::user()->role;
@endphp

<div class="flex flex-row bg-gray-100 text-gray-700">
    <div class="flex flex-col w-2/12 bg-white py-6 overflow-hidden">
        <div class="text-3xl font-bold p-2  px-4">
            Dashboard
        </div>
        <div class="h-1 w-full rounded bg-gradient-to-b from-gray-400 via-gray-600 to-blue-800"></div>
        
        <ul class="flex flex-col py-4">
          <li class="rounded-lg hover:bg-blue-100">
            <a href="{{ route('dashboard.'.$role)}}" class="flex flex-row items-center h-12 pl-4 no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700 hover:text-black">
              <span class="text-lg font-medium">Dashboard</span>
              <span class="ml-auto mr-6 text-lg bg-red-100 rounded-full px-3 py-px text-red-500">5</span>
            </a>
          </li>
          <li class="rounded-lg hover:bg-red-100">
            <a href="{{ route('creerAnnonce')}}" class="flex flex-row items-center h-12 pl-4 no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700 hover:text-black">
              <span class="text-lg font-medium">Creer annonce</span>
            </a>
          </li>
          <li class="rounded-lg hover:bg-green-100">
            <a href="#" class="flex flex-row items-center h-12 pl-4 no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700 hover:text-black">
              <span class="text-lg font-medium">Creer information</span>
            </a>
          </li>
          <li class="rounded-lg hover:bg-yellow-100">
            <a href="#" class="flex flex-row items-center h-12 pl-4 no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700 hover:text-black">
              <span class="text-lg font-medium">Mes publications</span>
            </a>
          </li>
          @if ($role == "Admin")
          <li class="rounded-lg hover:bg-gray-100">
            <a href="#" class="flex flex-row items-center h-12 pl-4 no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700 hover:text-black">
              <span class="text-lg font-medium">Ecran d'affichage</span>
            </a>
          </li>
          <li class="rounded-lg hover:bg-blue-100 ">
            <a href="#" class="flex flex-row items-center h-12 pl-4 no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700 hover:text-black">
              <span class="text-lg font-medium">Ajouter membre</span>
            </a>
          </li>
          <li class="rounded-lg hover:bg-red-100 ">
            <a href="#" class="flex flex-row items-center h-12 pl-4 no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700 hover:text-black">
              <span class="text-lg font-medium">Liste Membres</span>
            </a>
          </li>
          @endif

          
          @if ($role=="Responsable")
          <li class="rounded-lg hover:bg-green-100">
            <a href="#" class="flex flex-row items-center h-12 pl-4 no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700 hover:text-black">
              <span class="text-lg font-medium">Notifications</span>
            </a>
          </li>
          <li class="rounded-lg hover:bg-gray-100">
            <a href="#" class="flex flex-row items-center h-12 pl-4 no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700 hover:text-black">
              <span class="text-lg font-medium">Ecran d'affichage</span>
            </a>
          </li>
          <li class="rounded-lg hover:bg-blue-100 ">
            <a href="#" class="flex flex-row items-center h-12 pl-4 no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700 hover:text-black">
              <span class="text-lg font-medium">Ajouter membre</span>
            </a>
          </li>
          <li class="rounded-lg hover:bg-red-100 ">
            <a href="#" class="flex flex-row items-center h-12 pl-4 no-underline transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-700 hover:text-black">
              <span class="text-lg font-medium">Liste Membres</span>
            </a>
          </li>
          
          @endif
        </ul>
      </div>
    <main class="main w-10/12 m-1 bg-gray-50  shadow-md p-3">
        @yield('main')
    </main>
    
  </div>

@livewireScripts
@endsection
