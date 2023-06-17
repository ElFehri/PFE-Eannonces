@extends('layouts.guest')
@section('title', "Login")
@section('welcome')
<div class="my-12 lg:mt-24 ">
    <div class="flex justify-center">
        <div class="w-1/2 mt-6 ">
           
            <div class="bg-white shadow-lg rounded-lg">
                <div class="bg-green-700 text-white text-center text-xl py-2 px-6 rounded-t-lg">
                    <h1 class="font-bold text-3xl">{{ __('Login') }}</h1>
                    
                </div>
                @if (session('message'))
                    <div class="m-2 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative unauthorized-alert" role="alert">
                        <span class="block sm:inline">{{ session('message') }}</span>
                    </div>
                @endif

                <div class="px-16 py-8">
                    <form method="POST" action="{{ route('login') }}" class="py-8">
                        @csrf
                
                        <div class="mb-3">
                            <label for="email" class="block font-bold mb-2 text-lg">{{ __('Addresse email') }}</label>
                            <input id="email" type="email" placeholder="email" class="form-control @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autofocus>
                
                            @error('email')
                                @if ($errors->has('email'))
                                    <span class="text-red-500 text-sm mt-2">{{ $errors->first('email') }}</span>
                                @endif
                            @enderror
                        </div>
                
                        <div class="pt-6">
                            <label for="password" class="block font-bold mb-2 text-lg">{{ __('Mot de passe') }}</label>
                            <input id="password" type="password" placeholder="password" class="form-control @error('password') border-red-500 @enderror" name="password" required autocomplete="current-password">
                
                            @error('password')
                                @if ($errors->has('password'))
                                    <span class="text-red-500 text-sm mt-2">{{ $errors->first('password') }}</span>
                                @endif
                            @enderror
                        </div>
                
                        <div class="pt-3">
                            <label class="inline-flex items-center">
                                <input class="form-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span class="ml-2">{{ __('Remember Me') }}</span>
                            </label>
                        </div>
                
                        <div class="flex items-center justify-between mt-12">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                {{ __('Login') }}
                            </button>
                
                            @if (Route::has('password.request'))
                            <a class="text-blue-500 hover:text-blue-600 font-bold" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const alertElement = document.querySelector('.unauthorized-alert');

        if (alertElement) {
            setTimeout(function() {
                alertElement.remove();
            }, 5000);
        }
    });
</script>

@endsection
