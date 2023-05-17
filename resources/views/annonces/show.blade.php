@extends('layouts.app')
@section('title',' Annonce')
@section('content')
{{-- content --}}


<div class="flex justify-center">
    <div class="w-2/3 bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-4">
            <h2 class="text-xl text-center font-bold">{{ $annonce->title }}</h2>
            <p class="mt-2 text-lg p-4">{{ $annonce->content }}</p>
        </div>
        <div class="bg-gray-100 p-4 grid grid-cols-2 gap-4">
            <div>
                <p class="font-bold">Publication Start Date:</p>
                <p>{{ $annonce->publication->start_date }}</p>
            </div>
            <div>
                <p class="font-bold">Publication End Date:</p>
                <p>{{ $annonce->publication->end_date }}</p>
            </div>
            <div>
                <p class="font-bold">Created Date:</p>
                <p>{{ $annonce->created_at }}</p>
            </div>
            <div>
                <p class="font-bold">Updated Date:</p>
                <p>{{ $annonce->updated_at }}</p>
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
