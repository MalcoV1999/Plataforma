@extends('layouts.app')

@section('title', 'Detalles Usuario')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">{{ __('Detalles Usuario') }}</h1>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-lg font-bold">{{ __('Nombre') }}: {{ $user->name }}</h2>
            <p>{{ __('Nombre de Usuario') }}: {{ $user->username }}</p>
            <p>{{ __('Email') }}: {{ $user->email }}</p>
            <p>{{ __('Teléfono') }}: {{ $user->phone }}</p>
            <p>{{ __('Estado') }}: {{ $user->status === 'active' ? 'Activo' : 'Inactivo' }}</p>
            <div class="mt-4">
                <a href="{{ route('user.index') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none">
                    {{ __('Regresar') }}
                </a>
            </div>
        </div>
    </div>
@endsection
