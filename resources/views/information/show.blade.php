@extends('layouts.app')
@section('title',' Information')
@section('content')
{{-- content --}}


<div class="flex justify-center">
    <div class="w-2/3 bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-4">
            <p class="mt-2 text-lg p-4">{{ $information->content }}</p>
        </div>
        <div class="bg-gray-100 p-4 grid grid-cols-2 gap-1">
            <div>
                <p class="font-bold">Publication Start Date:</p>
                <p>{{ $information->publication->start_date }}</p>
            </div>
            <div>
                <p class="font-bold">Publication End Date:</p>
                <p>{{ $information->publication->end_date }}</p>
            </div>
            <div>
                <p class="font-bold">Created Date:</p>
                <p>{{ $information->created_at }}</p>
            </div>
            <div>
                <p class="font-bold">Updated Date:</p>
                <p>{{ $information->updated_at }}</p>
            </div>
        </div>        
        <div class="bg-gray-200 p-4 flex justify-between items-center">
            <a href="{{ route('information.edit', $information->id) }}" class="bg-blue-500 no-underline hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Modifier</a>
            <form action="{{ route('information.destroy', $information->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette information ?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Supprimer</button>
            </form>
        </div>
    </div>
    
</div>

@endsection
