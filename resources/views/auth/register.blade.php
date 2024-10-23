@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="text-center text-2xl font-semibold mb-6">{{ __('Register') }}</div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-gray-700">{{ __('Name') }}</label>
                    <input id="name" type="text" class="mt-2 w-full px-3 py-2 border rounded-md @error('name') border-red-500 @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="text-red-500 text-sm mt-1" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="mt-2 w-full px-3 py-2 border rounded-md @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="text-red-500 text-sm mt-1" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700">{{ __('Password') }}</label>
                    <input id="password" type="password" class="mt-2 w-full px-3 py-2 border rounded-md @error('password') border-red-500 @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="text-red-500 text-sm mt-1" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password-confirm" class="block text-gray-700">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="mt-2 w-full px-3 py-2 border rounded-md" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
            <p class="mt-4 text-center text-gray-600">Already have an account? 
                <a href="/login" class="text-purple-600 hover:underline">Sign in</a>
            </p>
        </div>
    </div>
</div>
@endsection
