@extends('responsable.notifications')

@section('information')
<div class="mt-8 bg-white pb-4 rounded-lg">
    <h3 class="font-semibold py-2 mb-8 text-center bg-red-900 text-white rounded-md">Nouveaux informations</h3>
    @if (count($newInformations) > 0)
        <ul class="list-disc list-inside">
            @foreach ($newInformations as $information)
                <hr class="my-4">
                <li class="text-xl font-bold">{{ $information->content }}</li>
                <div class="flex justify-center mt-4">
                    <a href="{{ route('publication.valide', $information->pub_id) }}" class="px-2 py-1 mr-96 no-underline text-white bg-green-500 rounded hover:bg-green-700">
                        Valider
                    </a>
                    <a href="{{ route('publication.reject', $information->pub_id) }}" class="px-2 py-1 no-underline text-white bg-red-500 rounded hover:bg-red-700">
                        Rejeter
                    </a>
                </div>
            @endforeach
            <hr class="my-4">
        </ul>
    @else
    <div>
        <p class="text-gray-700 p-4 font-bold text-lg">Aucune nouvelle information trouvée.</p>
    </div>
    
    @endif
</div>

@endsection
