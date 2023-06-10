@extends('layouts.app')
@section('title', "Profile d'utilisateur")
@section('content')

@php
    $annoncesCount = count($annonces);
    $informationsCount = count($informations);
@endphp

<div class="bg-white w-4/5 mx-auto rounded-lg shadow-md">
    <h1 class="text-2xl font-bold bg-gray-500 rounded-t-lg text-white text-center">Profile</h1>
    <div class="text-center">
        @if (session('message'))
            <div class="m-4 bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded relative session-alert">
                <span class="block sm:inline">{{ session('message') }}</span>
            </div>
        @endif
        @if (session('error'))
            <div class="m-4 bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded relative session-alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif
    </div>
    <div class="my-4 w-1/3 mx-auto font-sans text-lg p-3">
        <table class="w-2/3 mx-auto shadow-md">
            <tr class="border-b ">
                <td colspan="2" class="text-2xl text-center font-sans mt-8"><h1 class="rounded-full border border-solid shadow-md bg-white">{{ $user->name }}</h1></td>
            </tr>
            <tr class="border-b">
                <th class="py-2 px-4 bg-gray-100">Email</th>
                <td class="py-2 px-4">{{ $user->email }}</td>
            </tr>
            <tr class="border-b">
                <th class="py-2 px-4 bg-gray-100">CIN</th>
                <td class="py-2 px-4">{{ $user->CIN }}</td>
            </tr>
            <tr class="border-b">
                <th class="py-2 px-4 bg-gray-100">Rôle</th>
                <td class="py-2 px-4">{{ $user->role }}</td>
            </tr>
            <tr class="border-b">
                <th class="py-2 px-4 bg-gray-100">Total des annonces</th>
                <td class="py-2 px-4">{{ $annoncesCount}} </td>
            </tr>
            <tr class="border-b">
                <th class="py-2 px-4 bg-gray-100">Total des informations</th>
                <td class="py-2 px-4">{{ $informationsCount}} </td>
            </tr>
            <tr class="border-b">
                <th class="py-2 px-4 bg-gray-100">Autoriser</th>
                <td class="py-2 px-4 flex justify-between">
                    @if ($user->authorized)
                        <div>OUI</div>
                        @if (Auth::user()->role === "Responsable")
                            <div>
                                <a href="{{ route('userAuthorization', ['id' => $user->id]) }}" class="no-underline bg-red-500 hover:bg-red-600 text-white font-medium py-2 px-4 rounded-md">
                                    Non autoriser
                                </a>
                            </div>
                        @endif
                    @else
                        <div>NON</div>
                        @if (Auth::user()->role === "Responsable")
                            <div>
                                <a href="{{ route('userAuthorization', ['id' => $user->id]) }}" class="no-underline bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-4 rounded-md">
                                    Autorisation
                                </a>
                            </div>
                        @endif
                    @endif
                </td>
            </tr>
        </table>
    </div>
    @if (Auth::user()->role === "Responsable")
        <div class="flex justify-center">
            <button onclick="toggleHiddenForm()" class="mt-2 mb-4 bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-md">
                Changer Rôle
            </button>
        </div>
        <div id="hidden-form" class="hidden">
            <form action="{{ route('changeUserRole', ['id'=> $user->id]) }}" method="POST">
                @csrf
                <div class="my-2 w-2/3 mx-auto font-sans text-lg p-3">
                    <label for="role" class="block mb-2">Nouveau rôle:</label>
                    <select name="role" id="role" class="border border-gray-300 rounded-md p-2 w-full">
                        @if ($user->role === "Responsable")
                            <option value="{{ $user->role }}" selected>{{ $user->role }}</option>
                            <option value="Admin">Admin</option>
                            <option value="Member">Member</option>
                        @elseif ($user->role === "Admin")
                            <option value="{{ $user->role }}" selected>{{ $user->role }}</option>
                            <option value="Responsable">Responsable</option>
                            <option value="Member">Member</option>
                        @else 
                            <option value="{{ $user->role }}" selected>{{ $user->role }}</option>
                            <option value="Responsable">Responsable</option>
                            <option value="Admin">Admin</option>
                        @endif
                    </select>
                    <div class="flex justify-between">
                        <button type="reset" class="mt-4 bg-gray-500 hover:bg-bray-600 text-white font-medium py-1 px-2 rounded-md">
                            Annuler
                        </button>
                        <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-600 text-white font-medium py-1 px-2 rounded-md">
                            Changer
                        </button>
                    </div>
                </div>
            </form>            
        </div>
    @endif
</div>

{{-- user publications --}}
<div class="mt-4 bg-white w-4/5 mx-auto rounded-lg shadow-md pb-4">
    <h1 class="text-3xl font-bold bg-blue-900 rounded-t-lg text-white text-center"> Annonces</h1>
    <div class="flex justify-center">
        <button id="showAnnoncesBtn" class="bg-gray-500 hover:bg-gray-600 text-white font-medium py-1 px-2 rounded mt-2 ml-2">
            Afficher les annonces
        </button>
    </div>
    <div id="annoncesContainer" style="display: none">
        @if ($annoncesCount > 0)
            <div class="grid grid-cols-2 gap-4 p-4">
                @foreach ($annonces as $annonce)
                    <div class="bg-white px-4 py-2 shadow-md rounded-lg border border-solid flex flex-col justify-between">
                        <div>
                            <h2 class="text-2xl text-center font-bold">{{ $annonce->title }}</h2>
                            @if ($annonce->content)
                                <div class="text-xl bg-gray-50 border border-gray-200 rounded-md py-2 px-6">{!! $annonce->content !!}</div>
                            @endif

                            @if ($annonce->image)
                                <div class="mt-4">
                                    <img src="{{ asset('storage/annoncesImages/' . $annonce->image) }}" alt="Annonce Image" class="w-full h-64">
                                </div>
                            @endif
                        </div>

                        <div class="mt-2 px-8 flex justify-between items-center">
                            <div>
                                <p class="text-md text-gray-700"><b>Créée par:</b> {{ $annonce->publication->user->name }}</p>
                                <p class="text-md text-gray-700"><b>Créée le:</b> {{ $annonce->created_at->format('Y-m-d H:i:s') }}</p>
                            </div>
                            <a href="{{ route('annonces.show', $annonce->id) }}" class="no-underline bg-blue-500 hover:bg-blue-600 text-white text-center font-bold py-1 px-2 rounded">
                                <i class="fas fa-eye fa-lg mr-1"></i> Voir
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="m-4 bg-blue-100 border border-blue-400 text-center text-blue-900 px-4 py-2 rounded relative" role="alert">
                <span class="block sm:inline">Pas encore d'annonces.</span>
            </div>
        @endif
    </div>
</div>

<div class="mt-4 bg-white w-4/5 mx-auto rounded-lg shadow-md pb-4">
    <h1 class="text-3xl font-bold bg-green-900 rounded-t-lg text-white text-center">Informations</h1>
    <div class="flex justify-center">
        <button id="showInformationsBtn" class="bg-gray-500 hover:bg-gray-600 text-white font-medium py-1 px-2 rounded mt-2 ml-2">
            Afficher les informations
        </button>
    </div>
    <div id="informationsContainer" style="display: none">
        @if ($informationsCount > 0)
            <div class="grid lg:grid-cols-2 gap-2 sm:grid-cols-1 p-4">
                @foreach ($informations as $information)
                    <div class="bg-white px-4 py-2 shadow-md rounded-lg border border-solid flex flex-col justify-between">
                        <p class="text-xl bg-gray-100 rounded-md py-2 px-6">{{ $information->content }}</p>
                        <div class="mt-4 px-8 flex justify-between items-center">
                            <div>
                                <p class="text-md text-gray-700"><b>Créée par:</b> {{ $information->publication->user->name }}</p>
                                <p class="text-md text-gray-700"><b>Créée le:</b> {{ $information->created_at->format('Y-m-d H:i:s') }}</p>
                            </div>
                            <a href="{{ route('information.show', $information->id) }}" class="no-underline bg-blue-500 hover:bg-blue-600 text-white text-center font-bold py-1 px-2 rounded">
                                <i class="fas fa-eye fa-lg mr-1"></i> Voir
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="m-4 bg-blue-100 border border-blue-400 text-center text-blue-900 px-4 py-2 rounded relative" role="alert">
                <span class="block sm:inline">Pas encore d'informations.</span>
            </div>
        @endif
    </div>
</div>

<script>
    const showAnnoncesBtn = document.getElementById('showAnnoncesBtn');
    const showInformationsBtn = document.getElementById('showInformationsBtn');
    const annoncesContainer = document.getElementById('annoncesContainer');
    const informationsContainer = document.getElementById('informationsContainer');

    showAnnoncesBtn.addEventListener('click', () => {
        annoncesContainer.style.display = 'block';
        informationsContainer.style.display = 'none';
    });

    showInformationsBtn.addEventListener('click', () => {
        informationsContainer.style.display = 'block';
        annoncesContainer.style.display = 'none';
    });
</script>


<script>
    function toggleHiddenForm() {
        const hiddenForm = document.getElementById('hidden-form');
        hiddenForm.classList.toggle('hidden');
    }
</script>

<script src="{{ asset('js/messageTimeSet.js') }}"></script>
@endsection
