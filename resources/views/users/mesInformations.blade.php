@extends('layouts.app')
@section('title', 'Mes Informations')
@section('content')
<div>
    <!-- les informations d'utilisateur-->
    <h1 class="text-4xl text-center font-bold mt-4 my-4">Toutes mes informations</h1>
    <div class="grid grid-cols-2 gap-4">
        @forelse ($informations as $information)
            <div class="bg-white p-4 shadow-md flex flex-col justify-between">
                <p>{{ $information->content }}</p>
                <div class="mt-4 px-16 flex justify-between">
                    <a href="{{ route('information.edit', $information->id) }}" class="bg-blue-500 no-underline font-sans hover:bg-blue-600 text-white font-bold py-1 px-2 rounded">Editer</a>
                    <a href="{{ route('information.show', $information->id) }}" class="bg-green-500 no-underline font-sans hover:bg-gray-600 text-white font-bold py-1 px-2 rounded">Voir</a>
                    <div class="">
                        @if ($information->Masked)
                            <a href="{{route('publication.unmask', ['id'=>$information->pub_id])}}" class="no-underline  font-sans bg-gray-500 hover:bg-gray-600 text-white rounded-md px-3 py-2">Démasquer</a>
                        @else
                            <a href="{{route('publication.mask', ['id'=>$information->pub_id])}}" class="no-underline  font-sans bg-red-500 hover:bg-red-600 text-white rounded-md px-3 py-2">Masquer</a>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="mt-4 bg-blue-100 border border-blue-700 text-center text-blue-900 font-bold px-4 py-2 rounded relative " role="alert">
                <span class="block sm:inline">Vous n'avez pas encore d'information</span>
            </div>
        @endforelse
    </div>
</div>
@endsection