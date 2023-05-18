@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-4xl font-bold mb-4">All Informations</h1>

        <div class="grid grid-cols-1 gap-4">
            @foreach ($informations as $information)
                <div class="bg-white p-4 shadow-lg rounded-lg">
                    <p class="text-xl bg-gray-100 rounded-md py-2 px-6">{{ $information->content }}</p>
                    <div class="mt-2 px-16 flex justify-between items-center">
                        <span class="text-sm text-gray-500">Created by: {{ $information->publication->user->name }}</span>
                        <span class="text-sm text-gray-500">Created at: {{ $information->created_at->format('Y-m-d H:i:s') }}</span>
                        <a href="{{ route('information.show', $information->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-2 rounded">Show</a>
                    </div>
                </div>
            @endforeach

            @if ($informations->isEmpty())
                <div class="mt-4 bg-blue-100 border border-blue-400 text-center text-blue-900 px-4 py-2 rounded relative" role="alert">
                    <span class="block sm:inline">No informations available.</span>
                </div>
            @endif
        </div>
    </div>
@endsection
