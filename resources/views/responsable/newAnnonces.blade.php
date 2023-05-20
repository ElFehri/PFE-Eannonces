@extends('responsable.notifications')

@section('annonces')
<div class="mt-8 bg-white pb-4 rounded-lg">
    <h3 class="font-semibold py-2 mb-8 text-center bg-green-900 text-white rounded-md">Nouveaux annonces</h3>
    @if (count($newAnnonces) > 0)
        <ul class="list-disc list-inside">
            @foreach ($newAnnonces as $annonce)
                <hr class="my-4">
                <li class="font-bold text-xl">{{ $annonce->title }}</li>
                <p class="text-lg">{{ $annonce->content }}</p>
                <div class="flex justify-center mt-4">
                    <a href="{{ route('publication.valide', ['id'=>$annonce->pub_id]) }}" class="px-2 py-1 mr-96 no-underline text-white bg-green-500 rounded hover:bg-green-700">
                        Valider
                    </a>
                    <a href="{{ route('publication.reject', ['id'=>$annonce->pub_id]) }}" class="px-2 py-1 no-underline text-white bg-red-500 rounded hover:bg-red-700">
                        Rejeter
                    </a>
                </div>
            @endforeach
            <hr class="my-4">
        </ul>
    @else
    <div>
        <p class="text-gray-600 p-4 font-bold text-lg">Aucune nouvelle annonce trouvée.</p>
    </div>   
    @endif
</div>

@endsection
