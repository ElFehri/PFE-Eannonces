@extends('responsable.notifications')
@section('title', "Nouveaux utilisateurs")
@section('users')
    <div class="mt-8 bg-white  pb-4 rounded-lg">
        <h3 class="font-semibold py-2 mb-8 text-center bg-blue-900 text-white rounded-t-md">Nouveaux utilisateurs</h3>

        @if (count($newUsers))
            <div class="grid grid-cols-2 gap-4">
                @foreach($newUsers as $user)
                    <div class="border border-gray-200 bg-white shadow-md  border-solid rounded-lg p-4 mx-2 flex flex-col justify-between">
                        <div class="grid grid-cols-2">
                            <div class="pl-4">
                                <p class="text-lg font-bold">Nom & prenom: </p>
                                <p class="text-lg font-bold">Email: </p>
                                <p class="text-lg font-bold">CIN: </p>
                                <p class="text-lg font-bold">Role: </p>
                            </div>
                            <div class="pl-4">
                                <p class="text-lg">{{ $user->name }}</p>
                                <p class="text-lg">{{ $user->email }}</p>
                                <p class="text-lg">{{ $user->CIN }}</p>
                                <p class="text-lg">{{ $user->role }}</p>
                            </div>
                        </div>
                        <div class="mt-4 flex justify-between">
                            <a href="{{ route('responsable.validate', $user) }}" class="no-underline bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                                Accepter
                            </a>
                            <form action="{{ route('responsable.reject', $user) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                                    Rejeter
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
        <div class="m-4 bg-blue-100 border border-blue-400 text-center text-blue-900 px-4 py-2 rounded relative">
            <p class="block sm:inline">Aucun nouvel utilisateur trouvé.</p>
        </div> 
        @endif

    </div>

@endsection
