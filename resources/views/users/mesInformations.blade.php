@extends('layouts.app')
@section('title', 'Mes Informations')
@section('content')
<div class="bg-white w-4/5 pb-4 mx-auto rounded-lg shadow-md">
    <h1 class="text-2xl font-bold bg-blue-500 rounded-t-lg text-white text-center">Mes informations</h1>
    <div class="grid grid-cols-2 gap-4 p-2">
        @forelse ($informations as $information)
            <div class="bg-white p-4 shadow-md flex flex-col justify-between border border-solid rounded-lg">
                <p class="px-4 py-2 bg-gray-100 rounded-md">{{ $information->content }}</p>
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
        @endforeach
    </div>
    @empty($informations)
    <div class="m-4 bg-blue-100 border border-blue-700 text-center text-blue-900 font-bold px-4 py-2 rounded relative " role="alert">
        <span class="block sm:inline">Vous n'avez pas encore d'information</span>
    </div>
    @endempty
</div>
@endsection