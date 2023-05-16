<!-- home.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="mx-auto">
        <h1 class="text-4xl text-center font-bold my-4">Toute annonces</h1>
        <div class="grid grid-cols-1 gap-4">
            @forelse ($annonces as $annonce)
                <div class="bg-white p-4 shadow-md">
                    <h2 class="text-lg font-semibold">{{ $annonce->title }}</h2>
                    <p>{{ $annonce->content }}</p>
                    <div class="mt-4 px-16 flex justify-between">
                        <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-2 rounded">Modifier</button>
                        <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded">Supprimer</button>
                    </div>
                </div>
            @empty
                <p>Aucune annonce disponible.</p>
            @endforelse
        </div>

        <h1 class="text-4xl text-center font-bold my-4">Toute informations</h1>
        <div class="grid grid-cols-1 gap-4">
            @forelse ($informations as $information)
                <div class="bg-white p-4 shadow-md">
                    <p>{{ $information->content }}</p>
                    <div class="mt-4 px-16 flex justify-between">
                        <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-2 rounded">Modifier</button>
                        <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded">Supprimer</button>
                    </div>
                </div>
            @empty
                <p>Aucune information disponible.</p>
            @endforelse
        </div>
    </div>
@endsection
