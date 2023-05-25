@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-3xl font-bold mb-4">All Announces</h1>
        <hr>

        <div class="grid lg:grid-cols-2 gap-4 xl:grid-cols-3 sm:grid-cols-1">
            @foreach ($annonces as $annonce)
                <div class="bg-white px-4 py-2 shadow-lg rounded-lg">
                    <h2 class="text-2xl text-center font-bold">{{ $annonce->title }}</h2>
                    <p class="text-xl bg-gray-50 border border-gray-200 rounded-md py-2 px-6">{{ $annonce->content }}</p>
                    <div class="mt-2 px-8 flex justify-between items-center">
                       <div>
                        <p class="text-md text-gray-700"><b>Créée par:</b> {{ $annonce->publication->user->name }}</p>
                        <p class="text-md text-gray-700"><b>Créée le:</b> {{ $annonce->created_at->format('Y-m-d H:i:s') }}</p>
                       </div>
                        <a href="{{ route('annonces.show', $annonce->id) }}" class="no-underline bg-blue-500 hover:bg-blue-600 text-white text-center font-bold py-1 px-2 rounded">
                            <i class="fas fa-eye fa-lg mr-1"></i> Voir
                        </a>
                    </div>
                </div>
            @endforeach

            @if ($annonces->isEmpty())
                <div class="mt-4 bg-blue-100 border border-blue-400 text-center text-blue-900 px-4 py-2 rounded relative" role="alert">
                    <span class="block sm:inline">Pas encore d'annonces.</span>
                </div>
            @endif
        </div>
    </div>
@endsection
