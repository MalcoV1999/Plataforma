@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="text-center text-2xl font-semibold mb-6">{{ __('Login') }}</div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block text-gray-700">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="mt-2 w-full px-3 py-2 border rounded-md @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="text-red-500 text-sm mt-1" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700">{{ __('Password') }}</label>
                    <input id="password" type="password" class="mt-2 w-full px-3 py-2 border rounded-md @error('password') border-red-500 @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="text-red-500 text-sm mt-1" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <input class="form-check-input mr-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="text-gray-700" for="remember">{{ __('Remember Me') }}</label>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-blue-600 hover:underline" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
