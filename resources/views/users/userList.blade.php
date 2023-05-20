@extends('layouts.app')

@section('content')

    
        <div>
            <h2 class="text-2xl font-bold mb-2">Responsables</h2>
            <div class="grid grid-cols-3 gap-4">
            @foreach ($responsables as $user)
                <div class="bg-white rounded-lg shadow-md px-4 py-2">
                    <h3 class="text-center font-sans">{{ $user->name }}</h3>
                    <hr>
                    <div class="flex flex-row gap-2 justify-between">
                        <div>
                            <p class="font-semibold">Email:</p>
                            <p class="font-semibold">CIN:</p>
                            <p class="font-semibold">Role:</p>
                            <p class="font-semibold">Authorized:</p>
                        </div>
                        <div>
                            <p class="font-medium">{{ $user->email }}</p>
                            <p class="font-medium">{{ $user->CIN }}</p>
                            <p class="font-medium">{{ $user->role }}</p>
                            @if ($user->authorized)
                                <p class="font-medium">Oui</p>
                            @else
                                <p class="font-medium">Non</p>
                            @endif
                        </div>
                    </div>
                    <div class="mt-4 text-center">
                        <a href="{{ route('userProfile', ['id' => $user->id]) }}"
                           class="no-underline bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-2 rounded"><i
                                class="fas fa-user fa-lg mr-1"></i>Voir Profile</a>
                    </div>
                </div>
            @endforeach
        </div><hr>
        <div>
            <h2 class="text-2xl font-bold mb-2">Admins</h2>
            <div class="grid grid-cols-3 gap-4">
            @foreach ($admins as $user)
                <div class="bg-white rounded-lg shadow-md px-4 py-2">
                    <h3 class="text-center font-sans">{{ $user->name }}</h3>
                    <hr>
                    <div class="flex flex-row gap-2 justify-between">
                        <div>
                            <p class="font-semibold">Email:</p>
                            <p class="font-semibold">CIN:</p>
                            <p class="font-semibold">Role:</p>
                            <p class="font-semibold">Authorized:</p>
                        </div>
                        <div>
                            <p class="font-medium">{{ $user->email }}</p>
                            <p class="font-medium">{{ $user->CIN }}</p>
                            <p class="font-medium">{{ $user->role }}</p>
                            @if ($user->authorized)
                                <p class="font-medium">Oui</p>
                            @else
                                <p class="font-medium">Non</p>
                            @endif
                        </div>
                    </div>
                    <div class="mt-4 text-center">
                        <a href="{{ route('userProfile', ['id' => $user->id]) }}"
                           class="no-underline bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-2 rounded"><i
                                class="fas fa-user fa-lg mr-1"></i>Voir Profile</a>
                    </div>
                </div>
            @endforeach
        </div><hr>
        <div>
            <h2 class="text-2xl font-bold mb-2">Membres</h2>
            <div class="grid grid-cols-3 gap-4">
            @foreach ($membres as $user)
                <div class="bg-white rounded-lg shadow-md px-4 py-2">
                    <h3 class="text-center font-sans">{{ $user->name }}</h3>
                    <hr>
                    <div class="flex flex-row gap-2 justify-between">
                        <div>
                            <p class="font-semibold">Email:</p>
                            <p class="font-semibold">CIN:</p>
                            <p class="font-semibold">Role:</p>
                            <p class="font-semibold">Authorized:</p>
                        </div>
                        <div>
                            <p class="font-medium">{{ $user->email }}</p>
                            <p class="font-medium">{{ $user->CIN }}</p>
                            <p class="font-medium">{{ $user->role }}</p>
                            @if ($user->authorized)
                                <p class="font-medium">Oui</p>
                            @else
                                <p class="font-medium">Non</p>
                            @endif
                        </div>
                    </div>
                    <div class="mt-4 text-center">
                        <a href="{{ route('userProfile', ['id' => $user->id]) }}"
                           class="no-underline bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-2 rounded"><i
                                class="fas fa-user fa-lg mr-1"></i>Voir Profile</a>
                    </div>
                </div>
            @endforeach
        </div>
    @endsection
    
