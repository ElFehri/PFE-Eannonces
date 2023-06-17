@extends('layouts.app')
@section('title', "Editer information")
@section('content')
<div class="flex flex-col items-center justify-center mt-8">
    <div class="w-3/4">
        <form method="POST" action="{{ route('information.update', $information) }}" class="bg-white shadow-lg rounded px-16 pt-6 pb-8 mb-4">
            @csrf
            @method('PUT')
			      <h2 class="text-center font-bold text-3xl mb-3">Edit Information</h2>
                    <hr>
            <div class="my-4">
                <label class="block text-gray-700 text-lg font-bold mb-2" for="content">
                    Contenu
                </label>
                <textarea class="form-control" id="content" name="content" rows="5" placeholder="Description">{{ $information->content }}</textarea>
            </div>
            <div class="form-group text-gray-700 font-bold mb-4">
              <label class="block text-gray-700 text-lg font-bold mb-2" for="start_date">Date et heure de début:</label>
              <input type="datetime-local" class="form-control" id="start_date" name="start_date" value="{{ date('Y-m-d\TH:i', strtotime($publication->start_date)) }}"  required>
            </div>
          
            <div class="form-group text-gray-700 font-bold mb-2">
              <label class="block text-gray-700 text-lg font-bold mb-2" for="end_date">Date et heure de fin:</label>
              <input type="datetime-local" class="form-control" id="end_date" name="end_date" value="{{ date('Y-m-d\TH:i', strtotime($publication->end_date)) }}"  required>
            </div>
            <div class="flex items-center justify-between mt-4 ">
                <a href="{{ route('home') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline no-underline ">Annuler</a>
				        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Editer
                </button>
                
            </div>
        </form>
    </div>
</div>
@endsection


