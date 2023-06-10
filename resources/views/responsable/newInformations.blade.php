@extends('responsable.notifications')
@section('title', "Nouveaux informations")
@section('information')
<div class="mt-8 bg-white pb-4 rounded-lg">
    <h3 class="font-semibold py-2 mb-8 text-center bg-red-900 text-white rounded-t-md">Nouveaux informations</h3>
    @if (count($newInformations) > 0)
            @foreach ($newInformations as $information)
            <div class="py-2 px-4 mx-2 my-4 bg-white shadow-md rounded-md border border-gray-200">
                    <div class="text-lg bg-gray-100 border border-gray-200 py-2 px-4 rounded-md">{{$information->content}}</div>
                
                <div class="flex justify-between px-16 mt-4">
                    <a href="{{ route('publication.valide', $information->pub_id) }}" class="px-2 py-1 mr-96 no-underline text-white bg-green-500 rounded hover:bg-green-700">
                        Valider
                    </a>
                    <a href="{{ route('publication.reject', $information->pub_id) }}" class="px-2 py-1 no-underline text-white bg-red-500 rounded hover:bg-red-700">
                        Rejeter
                    </a>
                </div>
            </div>
            @endforeach
    @else
    <div>
        <p class="text-gray-700 p-4 font-bold text-lg">Aucune nouvelle information trouvée.</p>
    </div>
    
    @endif
</div>

@endsection
