@extends('layouts.app')
@section('title', "Mon profile")
@section('content')
    <div class="text-center">
        @if (session('message'))
            <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded relative session-alert">
                <span class="block sm:inline">{{ session('message') }}</span>
            </div>
        @endif
        @if (session('error'))
            <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded relative session-alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif
    </div>

    <h1 class="text-2xl font-bold mt-6">My Profile</h1>
<div class="mt-4 mx-16">
    <div class="grid grid-cols-2 gap-2 ">
        <div class="bg-white shadow-md rounded-md p-2">
            <p class="font-bold text-lg">Name:</p>
            <p class="text-center">{{ $user->name }}</p>
        </div>
        <div class="bg-white shadow-md rounded-md p-2">
            <p class="font-bold text-lg">Email:</p>
            <p class="text-center">{{ $user->email }}</p>
        </div>
        <div class="bg-white shadow-md rounded-md p-2">
            <p class="font-bold text-lg">CIN:</p>
            <p class="text-center">{{ $user->CIN }}</p>
        </div>
        <div class="bg-white shadow-md rounded-md p-2">
            <p class="font-bold text-lg">Role:</p>
            <p class="text-center">{{ $user->role }}</p>
        </div>
    </div>
</div>



    <h2 class="text-2xl font-bold mt-6">Edit Profile</h2>
    <form action="{{ route('editProfile') }}" method="POST" class="mt-4 mx-auto w-1/2">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-bold text-lg">Name:</label>
            <input type="text" name="name" value="{{ $user->name }}" required
                class="border border-gray-300 rounded-md px-4 py-2 w-full">
        </div>
        <div class="mb-4">
            <label for="email" class="block text-sm font-bold text-lg">Email:</label>
            <input type="email" name="email" value="{{ $user->email }}" required
                class="border border-gray-300 rounded-md px-4 py-2 w-full">
        </div>
        <div class="mb-4">
            <label for="CIN" class="block text-sm font-bold text-lg">CIN:</label>
            <input type="text" name="CIN" value="{{ $user->CIN }}" required
                class="border border-gray-300 rounded-md px-4 py-2 w-full">
        </div>
        <div class="mb-4">
            <label for="password" class="block text-sm font-bold text-lg">New Password:</label>
            <input type="password" name="password" required class="border border-gray-300 rounded-md px-4 py-2 w-full">
        </div>
        <div class="mb-4">
            <label for="password_confirmation" class="block text-sm font-bold text-lg">Confirm Password:</label>
            <input type="password" name="password_confirmation" required
                class="border border-gray-300 rounded-md px-4 py-2 w-full">
        </div>
        <button type="submit"
            class="bg-blue-500 hover:bg-blue-600 text-white font-bold text-lg py-2 px-4 rounded-md">
            Update Profile
        </button>
    </form>

        <script src="{{ asset('js/messageTimeSet.js') }}"></script>
@endsection
