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
                        <a href="{{ route('annonces.edit', $annonce->id) }}" class="bg-blue-500 no-underline hover:bg-blue-600 text-white font-bold py-1 px-2 rounded">Modifier</a>
                        <form action="{{ route('annonces.destroy', $annonce->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded">Supprimer</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="mt-4 bg-blue-100 border border-blue-400 text-center text-blue-900 px-4 py-2 rounded relative session-alert" role="alert">
                    <span class="block sm:inline">Aucune annonce créée aujourd'hui.</span>
                </div>
            @endforelse
        </div>

        <h1 class="text-4xl text-center font-bold my-4">Toute informations</h1>
        <div class="grid grid-cols-1 gap-4">
            @forelse ($informations as $information)
                <div class="bg-white p-4 shadow-md">
                    <p>{{ $information->content }}</p>
                    <div class="mt-4 px-16 flex justify-between">
                        <a href="{{ route('information.edit', $information->id) }}" class="bg-blue-500 no-underline hover:bg-blue-600 text-white font-bold py-1 px-2 rounded">Modifier</a>
                        <form action="{{ route('information.destroy', $information->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette information ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded">Supprimer</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="mt-4 bg-blue-100 border border-blue-400 text-center text-blue-900 px-4 py-2 rounded relative session-alert" role="alert">
                    <span class="block sm:inline">Aucune information créée aujourd'hui.</span>
                </div>
            @endforelse
        </div>
    </div>
@endsection
