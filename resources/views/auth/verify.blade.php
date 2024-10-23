@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="text-center text-2xl font-semibold mb-6">{{ __('Verify Your Email Address') }}</div>

            <div class="text-gray-700 mb-4">
                @if (session('resent'))
                    <div class="bg-green-100 text-green-700 p-4 rounded-md mb-4">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif

                {{ __('Before proceeding, please check your email for a verification link.') }}
                {{ __('If you did not receive the email') }},
            </div>

            <form method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <div class="text-center">
                    <button type="submit" class="text-blue-600 hover:underline">
                        {{ __('click here to request another') }}
                    </button>.
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
