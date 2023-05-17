@extends('layouts.app')
@section('title', 'Mes Annonces')
@section('content')


<div class="">
        <!-- Les annonces d'utilisateur-->
        <h1 class="text-4xl text-center font-bold my-4">Toutes mes annonces</h1>
        <div class="grid grid-cols-1 gap-4">
            @forelse ($annonces as $annonce)
                <div class="bg-white p-4 shadow-md">
                    <h2 class="text-lg font-semibold">{{ $annonce->title }}</h2>
                    <p>{{ $annonce->content }}</p>
                    <div class="mt-4 px-16 flex justify-between">
                        <a href="{{ route('annonces.edit', $annonce->id) }}" class="bg-blue-500 no-underline hover:bg-blue-600 text-white font-bold py-1 px-2 rounded">Editer</a>
                        <form action="{{ route('annonces.destroy', $annonce->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded">Masquer</button>
                        </form>
                        <a href="{{ route('annonces.show', $annonce->id) }}" class="bg-green-500 no-underline hover:bg-gray-600 text-white font-bold py-1 px-2 rounded">Voir</a>
                    </div>
                </div>
            @empty
                <div class="mt-4 bg-blue-100 border border-blue-400 text-center text-blue-900 px-4 py-2 rounded relative" role="alert">
                    <span class="block sm:inline">Aucune annonce créée aujourd'hui.</span>
                </div>
            @endforelse
        </div>
</div>
@endsection
