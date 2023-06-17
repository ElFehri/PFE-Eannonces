@extends('layouts.app')
@section('title', "Nouveau information")
@section('content')

<div class="bg-white mt-2 pb-4 rounded-lg w-3/4 mx-auto">
    <h2 class="text-2xl text-center text-white bg-red-900 rounded-t-lg font-bold my-2 p-2">Nouveau information</h2>
    {{-- affichage des messages --}}
    <div class="text-center mx-4">
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
    <div class="px-16 py-2">
        <form method="POST" action="{{ route('information.store') }}" >
            @csrf
            <div class="my-4">
               <label class="block text-gray-700 text-xl font-bold mb-2" for="content">
                Contenu
                </label>
               <textarea class="form-control" id="content" name="content" rows="5" placeholder="Contenu ..."></textarea>
            </div>
            
            <div class="form-group text-gray-700 font-bold mb-2">
              <label class="block text-gray-700 text-xl font-bold mb-2" for="start_date">Date et heure de début:</label>
              <input type="datetime-local" class="form-control" id="start_date" name="start_date"  required>
            </div>
          
            <div class="form-group text-gray-700 font-bold mb-2">
              <label class="block text-gray-700 text-xl font-bold mb-2" for="end_date">Date et heure de fin:</label>
              <input type="datetime-local" class="form-control" id="end_date" name="end_date"  required>
            </div>
            <div class="flex items-center justify-between mt-4 ">
                <a href="{{ route("home") }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline no-underline ">Annuler</a>
				<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Creer
                </button>
                
            </div>
        </form>
    </div> 
</div>

<script src="{{asset('/js/messageTimeSet.js')}}"></script>

@endsection
