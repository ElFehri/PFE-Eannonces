@extends('layouts.app')

@section('content')
    <div class="mx-auto">

        <!-- les messages de session -->
        <div class="text-center">
            @if (session('message'))
                <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded relative session-alert" role="alert">
                    <span class="block sm:inline font-sans">{{ session('message') }}</span>
                </div>
            @endif
            @if (session('error'))
                <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded relative session-alert" role="alert">
                    <span class="block sm:inline font-sans">{{ session('error') }}</span>
                </div>
            @endif
        </div>

      
        <!-- Partie des annonces -->
        <div class="mt-8 bg-white pb-4 rounded-lg">
            <h3 class="font-semibold py-2 mb-8 text-center bg-red-900 text-white rounded-t-lg">Toutes les annonces que vous avez créées aujourd'hui.</h3>        <div class="grid grid-cols-1 gap-4">
            @forelse ($annonces as $annonce)
                <div class="bg-white p-4 shadow-md border border-gray-300 m-2 rounded-lg">
                    <h3 class="text-lg text-center font-semibold">{{ $annonce->title }}</h3>
                    <p class="px-4 py-2 bg-gray-100 rounded-md">{{ $annonce->content }}</p>
                    <div class="mt-4 px-16 flex justify-between">
                        <a href="{{ route('annonces.edit', $annonce->id) }}" class="bg-blue-500 no-underline font-sans hover:bg-blue-600 text-white font-bold py-1 px-2 rounded">Editer</a>
                        <a href="{{ route('annonces.show', $annonce->id) }}" class="bg-green-500 no-underline font-sans hover:bg-gray-600 text-white font-bold py-1 px-2 rounded">Voir</a>
                        <div>
                            @if ($annonce->Masked)
                                <a href="{{route('publication.unmask', ['id'=>$annonce->pub_id])}}" class="no-underline  font-sans bg-green-500 hover:bg-green-600 text-white rounded-md px-3 py-2">Démasquer</a>
                            @else
                                <a href="{{route('publication.mask', ['id'=>$annonce->pub_id])}}" class="no-underline  font-sans bg-gray-500 hover:bg-gray-600 text-white rounded-md px-3 py-2">Masquer</a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="m-2 bg-blue-100 border border-blue-400 text-center text-blue-900 px-4 py-2 rounded relative" role="alert">
                    <span class="block sm:inline font-sans font-semibold">Aucune annonce créée aujourd'hui.</span>
                </div>
            @endforelse
        </div>
    </div>
    <hr>

    <div class="mt-8 bg-white pb-4 rounded-lg">
        <!-- Partie des informations -->
        <h3 class="font-semibold py-2 mb-8 text-center bg-green-900 text-white rounded-t-lg">Toutes les annonces que vous avez créées aujourd'hui.</h3>
        <div class="grid grid-cols-1 gap-4">
            @forelse ($informations as $information)
                <div class="bg-white p-4 shadow-md border border-gray-300 m-2 rounded-lg">
                    <p class="px-4 py-2 bg-gray-100 rounded-md">{{ $information->content }}</p>
                    <div class="mt-4 px-16 flex justify-between">
                        <a href="{{ route('information.edit', $information->id) }}" class="bg-blue-500 no-underline font-sans hover:bg-blue-600 text-white font-bold py-1 px-2 rounded">Editer</a>
                        <a href="{{ route('information.show', $information->id) }}" class="bg-green-500 no-underline font-sans hover:bg-gray-600 text-white font-bold py-1 px-2 rounded">Voir</a>
                        <div>
                            @if ($information->Masked)
                                <a href="{{route('publication.unmask', ['id'=>$information->pub_id])}}" class="no-underline font-sans  bg-green-500 hover:bg-green-600 text-white rounded-md px-3 py-2">Démasquer</a>
                            @else
                                <a href="{{route('publication.mask', ['id'=>$information->pub_id])}}" class="no-underline font-sans bg-gray-500 hover:bg-gray-600 text-white rounded-md px-3 py-2">Masquer</a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="m-2 bg-blue-100 border border-blue-400 text-center text-blue-900 px-4 py-2 rounded relative " role="alert">
                    <span class="block sm:inline font-sans font-semibold">Aucune information créée aujourd'hui.</span>
                </div>
            @endforelse
        </div>
    </div>
    <script src="{{asset('/js/messageTimeSet.js')}}"></script>
@endsection
