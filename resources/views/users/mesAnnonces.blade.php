@extends('layouts.app')
@section('title', 'Mes Annonces')
@section('content')

<div class="">
    <!-- Les annonces d'utilisateur-->
    <h1 class="text-4xl text-center font-bold my-4">Toutes mes annonces</h1>
    <div class="grid grid-cols-2 gap-4">
        @forelse ($annonces as $annonce)
        <div class="bg-white p-4 shadow-md border border-gray-300 m-2 rounded-lg flex flex-col justify-between">
            <div>
                <h3 class="text-lg text-center font-semibold">{{ $annonce->title }}</h3>
                @if ($annonce->content)
                    <p class="px-4 py-2 bg-gray-100 rounded-md">{{ $annonce->content }}</p>
                @endif
                
                @if ($annonce->image)
                    <div class="mt-4">
                        <img src="{{ asset('storage/annoncesImages/' . $annonce->image) }}" alt="Annonce Image" class="w-48 h-48 object-cover mx-auto border border-solid">
                    </div>
                @endif
            </div>
            
            <div class="mt-4 flex justify-between">
                <a href="{{ route('annonces.edit', $annonce->id) }}" class="bg-blue-500 no-underline font-sans hover:bg-blue-600 text-white font-bold py-1 px-2 rounded">Editer</a>
                <a href="{{ route('annonces.show', $annonce->id) }}" class="bg-green-500 no-underline font-sans hover:bg-gray-600 text-white font-bold py-1 px-2 rounded">Voir</a>
                <div>
                    @if ($annonce->Masked)
                        <a href="{{ route('publication.unmask', ['id'=>$annonce->pub_id]) }}" class="no-underline  font-sans bg-gray-500 hover:bg-gray-600 text-white rounded-md px-3 py-2">Démasquer</a>
                    @else
                        <a href="{{ route('publication.mask', ['id'=>$annonce->pub_id]) }}" class="no-underline  font-sans  bg-red-500 hover:bg-red-600 text-white rounded-md px-3 py-2">Masquer</a>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="mt-4 bg-blue-100 border border-blue-400 text-center text-blue-900 px-4 py-2 rounded relative" role="alert">
            <span class="block sm:inline">Vous n'avez pas encore d'annonces</span>
        </div>
        @endforelse
    </div>
</div>
@endsection
