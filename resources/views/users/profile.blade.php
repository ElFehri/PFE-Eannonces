@extends('layouts.app')
@section('title', "Mon profile")
@section('content')

<div class="bg-white w-4/5 mx-auto rounded-lg shadow-md">
    <h1 class="text-2xl font-bold bg-gray-500 rounded-t-lg text-white text-center">Profil</h1>
    
    <div class="my-4 w-1/3 mx-auto font-sans text-lg p-3">
        <table class="w-2/3 mx-auto">
            <tr class="border-b p-2">
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
                <th class="py-2 px-4 bg-gray-100">Autoriser</th>
                <td class="py-2 px-4">
                    @if ($user->authorized)
                        OUI
                    @else
                        NON
                    @endif
                </td>
            </tr>
            <tr class="border-b">
                <th class="py-2 px-4 bg-gray-100">Total annonces</th>
                <td class="py-2 px-4">{{ $tA }} </td>
            </tr>
            <tr class="border-b">
                <th class="py-2 px-4 bg-gray-100">Total informations</th>
                <td class="py-2 px-4">{{ $tI }}</td>
            </tr>
        </table>
    </div>

</div>


<div class="mt-8 pb-8 bg-white w-4/5 mx-auto rounded-lg shadow-md">
    <h1 class="text-2xl font-bold bg-blue-500 rounded-t-lg text-white text-center">Editer Profile</h1>
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
    <form action="{{ route('editProfile') }}" method="POST" class="mt-4 mx-auto w-1/2">
        @csrf
        <div class="mb-4">
            <label for="name" class="block font-bold text-lg">Nom & Prénom:</label>
            <input type="text" name="name" value="{{ $user->name }}" required
                class="border border-gray-300 rounded-md px-4 py-2 w-full">
        </div>
        <div class="mb-4">
            <label for="email" class="block font-bold text-lg">Email:</label>
            <input type="email" name="email" value="{{ $user->email }}" required
                class="border border-gray-300 rounded-md px-4 py-2 w-full">
        </div>
        <div class="mb-4">
            <label for="CIN" class="block font-bold text-lg">CIN:</label>
            <input type="text" name="CIN" value="{{ $user->CIN }}" required
                class="border border-gray-300 rounded-md px-4 py-2 w-full">
        </div>
        <div class="mb-4">
            <label for="password" class="block font-bold text-lg">Nouveau mot de pass:</label>
            <input type="password" name="password" placeholder="password" required class="border border-gray-300 rounded-md px-4 py-2 w-full">
        </div>
        <div class="mb-4">
            <label for="password_confirmation" class="block font-bold text-lg">Confirmer mot de pass:</label>
            <input type="password" name="password_confirmation" placeholder="password confirmation" required  class="border border-gray-300 rounded-md px-4 py-2 w-full">
        </div>
        <div class="flex justify-between">
            <button type="reset"
            class="bg-gray-500 hover:bg-gray-600 text-white font-bold text-lg py-2 px-4 rounded-md">
            Annuler
            </button>
            <button type="submit"
            class="bg-blue-500 hover:bg-blue-600 text-white font-bold text-lg py-2 px-4 rounded-md">
            Editer
        </button>
        </div>
    </form>
</div>


<script src="{{ asset('js/messageTimeSet.js') }}"></script>
@endsection
