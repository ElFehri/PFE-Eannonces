@extends('home')
@section('title', 'All announcements')

@section('annonces')

<div class=""><h1 class="text-center font-bold text-sky-800 mt-8">Tous annonces</h1></div>

@foreach ($annonces as $annonce)     
    <div class="m-4 mr-8 shadow-lg rounded-md bg-white w-auto px-4 py-2 ">
        
        <div class="flex flex-wrap justify-between ">
            <div class="font-bold">Creator name</div>
            <div class="font-bold">{{$annonce->created_at }}</div>
            <div class="font-bold"> <strong>X </strong></div>
        </div>
        <div class=" bg-gray-50 rounded-md  ">
            <h4 class="text-center text-xl mt-6"> {{$annonce->title}}</h4>
        <div class="p-4">{{ $annonce->content}}</div>
    </div>
    <div class="flex flex-wrap justify-around mt-2">
        <div class="font-bold"><button class="bg-red-200 hover:bg-red-400 rounded-full px-2 py-1 ">Rejouter</button></div>
        <div class="font-bold"><button class="bg-green-200 hover:bg-green-400 rounded-full px-2 py-1 ">Valider</button></div>
    </div>
</div>
            @endforeach

@endsection
