@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">User Profile</h1>
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full">
            <tr class="border-b">
                <th class="py-2 px-4 bg-gray-100">Name:</th>
                <td class="py-2 px-4">{{ $user->name }}</td>
            </tr>
            <tr class="border-b">
                <th class="py-2 px-4 bg-gray-100">Email:</th>
                <td class="py-2 px-4">{{ $user->email }}</td>
            </tr>
            <tr class="border-b">
                <th class="py-2 px-4 bg-gray-100">CIN:</th>
                <td class="py-2 px-4">{{ $user->CIN }}</td>
            </tr>
            <tr class="border-b">
                <th class="py-2 px-4 bg-gray-100">Role:</th>
                <td class="py-2 px-4">{{ $user->role }}</td>
            </tr>
            <tr class="border-b">
                <th class="py-2 px-4 bg-gray-100">Authorized:</th>
                <td class="py-2 px-4">{{ $user->authorized }}</td>
            </tr>
        </table>
    </div>
    <form action="{{ route('deleteUser', ['id' => $user->id]) }}" method="POST" class="mt-4">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-medium py-2 px-4 rounded-md">
            Remove Permissions
        </button>
    </form>
@endsection
