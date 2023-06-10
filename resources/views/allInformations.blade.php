@extends('layouts.app')
@section('title', "Toutes informations")
@section('content')
<div class="mt-4  bg-white w-4/5 mx-auto rounded-lg shadow-md">
    <h1 class="text-3xl font-bold bg-green-900 rounded-t-lg text-white text-center">Toutes informations</h1>

        <div class="grid lg:grid-cols-2 gap-2 sm:grid-cols-1 p-4">
            @foreach ($informations as $information)
                <div class="bg-white px-4 py-2 shadow-md rounded-lg border border-solid flex flex-col justify-between">
                    <p class="text-xl bg-gray-100 rounded-md py-2 px-6">{{ $information->content }}</p>
                    <div class="mt-4 px-8 flex justify-between items-center">
                        <div>
                         <p class="text-md text-gray-700"><b>Créée par:</b> {{ $information->publication->user->name }}</p>
                         <p class="text-md text-gray-700"><b>Créée le:</b> {{ $information->created_at->format('Y-m-d H:i:s') }}</p>
                        </div>
                         <a href="{{ route('information.show', $information->id) }}" class="no-underline bg-blue-500 hover:bg-blue-600 text-white text-center font-bold py-1 px-2 rounded">
                             <i class="fas fa-eye fa-lg mr-1"></i> Voir
                         </a>
                     </div>
                </div>
            @endforeach
        </div>
        @if ($informations->isEmpty())
            <div class="mt-4 bg-blue-100 border border-blue-400 text-center text-blue-900 px-4 py-2 rounded relative" role="alert">
                <span class="block sm:inline">No informations available.</span>
            </div>
        @else
            <div class="my-2 mx-auto px-4 pb-4">
                {{ $informations->links() }}
            </div> 
        @endif
    </div>
@endsection
