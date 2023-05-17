@extends('layouts.guest')

@section('welcome')
<div class="mt-12 xl:mt-24">
    <div class="flex justify-center">
        <div class="w-1/2 mt-6">
            <div class="bg-white shadow-lg rounded-lg">
                <div class="bg-blue-900 text-white text-center text-xl py-2 px-6 rounded-t-lg">
                    <h1 class="font-bold text-3xl">{{ __('Registration') }}</h1>
                </div>

                <div class="px-8 py-3">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="block font-bold mb-1 text-lg">{{ __('Nom & Prenom') }}</label>
                            <input id="name" type="text" class="form-control @error('name') border-red-500 @enderror" name="name" value="{{ old('name') }}"  autofocus>

                            @error('name')
                            <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="block font-bold mb-1 text-lg">{{ __('Addresse Email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" >

                            @error('email')
                            <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="CIN" class="block font-bold mb-1 text-lg">{{ __('CIN') }}</label>
                            <input id="CIN" type="text" class="form-control @error('CIN') border-red-500 @enderror" name="CIN" value="{{ old('CIN') }}" >

                            @error('CIN')
                            <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="block font-bold mb-1 text-lg" for="role" >
                                {{ __('Role') }}
                            </label>
                            <div class="">
                                <select id="role" name="role"  class="form-control">
                                    <option value="Member">Membre</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Responsable">Responsable</option>
                                  </select>
                            </div>
                        </div>
                        

                        <div class="mb-3">
                            <label for="password" class="block font-bold mb-1 text-lg">{{ __('Mot de passe') }}</label>
                            <input id="password" type="password" class="form-control @error('password') border-red-500 @enderror" name="password" >

                            @error('password')
                            <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password-confirm" class="block font-bold mb-1 text-lg">{{ __('Confirmation') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                {{ __('Register') }}
                            </button>

                            @if (Route::has('login'))
                            <a class="text-blue-500 hover:text-blue-600 font-bold" href="{{ route('login') }}">
                                {{ __('Already have an account?') }}
                            </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
