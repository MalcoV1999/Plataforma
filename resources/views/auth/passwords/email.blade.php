@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-md bg-white shadow-md rounded-lg p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-6 text-center">{{ __('Reset Password') }}</h2>

        @if (session('status'))
            <div class="bg-green-100 text-green-700 p-4 rounded-md mb-6 text-center">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email Address') }}</label>
                <input id="email" type="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autofocus>

                @error('email')
                    <span class="text-red-500 text-sm mt-2">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
