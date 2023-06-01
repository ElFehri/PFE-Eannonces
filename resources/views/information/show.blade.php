@extends('layouts.app')
@section('title',' Voir information')
@section('content')
{{-- content --}}


<div class="flex justify-center">
    <div class="w-3/4 bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-4">
            <p class="mt-2 text-lg p-4">{{ $information->content }}</p>
        </div>
        <div class="bg-gray-100 p-4 grid grid-cols-2 gap-1">
            <div>
                <p class="font-bold">Date de début:</p>
                <p>{{ $information->publication->start_date }}</p>
                
            </div>
            <div>
                <p class="font-bold">Date de fin:</p>
                <p>{{ $information->publication->end_date }}</p>
                
            </div>
            <div>
                <p class="font-bold">Date de création:</p>
                <p>{{ $information->created_at }}</p>
                
            </div>
            <div>
                <p class="font-bold">Date de modification</p>
                <p>{{ $information->updated_at }}</p>
                
            </div>
        </div> 
        <div class="bg-gray-100 flex flex-row justify-center">
            <p class="font-bold">Crée par : {{ $information->publication->user->name }}</p>
        </div>        
        <div class="bg-gray-200 p-4 flex justify-between items-center">
            <a href="{{ route('information.edit', $information->id) }}" class="bg-blue-500 no-underline hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Modifier</a>
            @if ($information->publication->Masked)
                <a href="{{route('publication.unmask', ['id'=>$information->pub_id])}}" class="no-underline  font-sans bg-gray-500 hover:bg-gray-600 text-white rounded-md px-3 py-2">Démasquer</a>
            @else
                <a href="{{route('publication.mask', ['id'=>$information->pub_id])}}" class="no-underline  font-sans bg-red-500 hover:bg-red-600 text-white rounded-md px-3 py-2">Masquer</a>
            @endif
        </div>
    </div>
    
</div>

@endsection
