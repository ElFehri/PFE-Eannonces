@extends('home')
@section('content')

<div class=""><h1 class="text-center font-bold text-sky-800 mt-8">Tous information</h1></div>

    @foreach ($information as $info)
    <div class="m-4 mr-8 shadow-md rounded-md bg-white w-auto px-4 py-2 ">
        <div class="flex flex-wrap justify-between ">
            <div class="font-bold">Creator name</div>
            <div class="font-bold">{{ $info->created_at }}</div>
            <div class="font-bold">
                <form action="{{route('information.destroy', $info->pub_id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit"><strong>X </strong></button>
                </form>
            </div>
        </div>
        <div class=" bg-gray-50 rounded-md  ">
            <div class="p-4">{{ $info->content }} </div>
        </div>
        <div class="flex flex-wrap justify-around mt-2">
            <div class="font-bold"><button class="bg-red-200 hover:bg-red-400 rounded-full px-2 py-1 ">Rejouter</button></div>
            <div class="font-bold"><button class="bg-green-200 hover:bg-green-400 rounded-full px-2 py-1 ">Valider</button></div>
        </div>
    </div>
    @endforeach
@endsection