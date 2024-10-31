@extends('layouts.app')

@section('title', 'Detalles Cliente')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">{{ __('Detalles Cliente') }}</h1>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-lg font-bold">{{ __('Nombre') }}: {{ $client->name }}</h2>
            <h2 class="text-lg font-bold">{{ __('Apellido') }}: {{ $client->last_name }}</h2>
            <p>{{ __('DNI') }}: {{ $client->dni }}</p>
            <p>{{ __('Email') }}: {{ $client->email }}</p>
            <p>{{ __('Teléfono') }}: {{ $client->phone }}</p>
            <p>{{ __('Dirección') }}: {{ $client->address }}</p>
            <p>{{ __('Región') }}: {{ $client->region }}</p>
            <div class="mt-4">
                <a href="{{ route('client.index') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none">
                    {{ __('Regresar') }}
                </a>
            </div>
        </div>
    </div>
@endsection
