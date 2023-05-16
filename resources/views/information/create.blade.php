@extends('layouts.app')
@section('content')



<div class="flex flex-col items-center justify-center mt-8 ">
    <div class="w-3/4">
        <form method="POST" action="{{ route('information.store') }}" class="bg-white shadow-lg rounded px-8 pt-6 pb-8 mb-4">
            @csrf
			<h2 class="text-center font-bold text-3xl mb-3">Nouveau Information</h2>
            
            {{-- affichage des messages --}}
            <div class="text-center">
                @if (session('message'))
                    <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded relative session-alert" role="alert">
                        <span class="block sm:inline">{{ session('message') }}</span>
                    </div>
                @endif
                @if (session('error'))
                    <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded relative session-alert" role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif
            </div>

            <div class="mb-4">
               <label class="block text-gray-700 font-bold mb-2" for="content">
                Description
                </label>
               <textarea class="form-input rounded-md shadow-sm mt-1 block w-full pl-4 border-2 " id="content" name="content" rows="5" placeholder="Description"></textarea>
            </div>
            
            <div class="form-group text-gray-700 font-bold mb-2">
              <label for="start_date">Date et heure de début:</label>
              <input type="datetime-local" class="form-control" id="start_date" name="start_date"  required>
            </div>
          
            <div class="form-group text-gray-700 font-bold mb-2">
              <label for="end_date">Date et heure de fin:</label>
              <input type="datetime-local" class="form-control" id="end_date" name="end_date"  required>
            </div>
            <div class="flex items-center justify-between mt-4 ">
                <a href="{{ route("home") }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline no-underline ">Retourne</a>
				<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Creer
                </button>
                
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const alertElement = document.querySelector('.session-alert');

        if (alertElement) {
            setTimeout(function() {
                alertElement.remove();
            }, 5000);
        }
    });
</script>
@endsection
