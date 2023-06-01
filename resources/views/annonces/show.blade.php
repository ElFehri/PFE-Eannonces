@extends('layouts.app')
@section('title', 'Annonce')
@section('content')

<div class="flex justify-center">
    <div class="w-4/5 bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-4">
            <h2 class="text-xl text-center font-bold">{{ $annonce->title }}</h2>
            <p class="mt-2 text-lg p-4">{{ $annonce->content }}</p>
            
            @if ($annonce->image)
                <div class="border border-solid">
                    <img src="{{ asset('storage/annoncesImages/' . $annonce->image) }}" alt="Annonce Image" class="w-full">
                </div>
            @endif
        </div>
        <div class="bg-gray-100 p-4 grid grid-cols-2">
            <div>
                <p class="font-bold ml-24">Date de début:</p>
                <p class="ml-24">{{ $annonce->publication->start_date }}</p>
            </div>
            <div>
                <p class="font-bold ml-24">Date de fin:</p>
                <p class="ml-24">{{ $annonce->publication->end_date }}</p>
            </div>
            <div>
                <p class="font-bold ml-24">Date de création:</p>
                <p class="ml-24">{{ $annonce->created_at }}</p>
            </div>
            <div>
                <p class="font-bold ml-24">Date de modification:</p>
                <p class="ml-24">{{ $annonce->updated_at }}</p>
            </div>
        </div>
            
        <div class="bg-gray-200 p-4 flex justify-between items-center">
            <a href="{{ route('annonces.edit', $annonce->id) }}" class="bg-blue-500 no-underline hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Modifier</a>
            <form action="{{ route('annonces.destroy', $annonce->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce ?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Supprimer</button>
            </form>
        </div>
    </div>
</div>

@endsection
