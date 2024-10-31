@extends('layouts.app')

@section('title', 'Detalles de Puntos')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">{{ __('Detalles de Puntos') }}</h1>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-lg font-bold">{{ __('ID de Usuario') }}: {{ $point->user_id }}</h2>
            <p>{{ __('Cantidad') }}: {{ $point->amount }}</p>
            <p>{{ __('Fecha de Carga') }}: {{ $point->load_date }}</p>
            <div class="mt-4">
                <a href="{{ route('point.index') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none">
                    {{ __('Regresar') }}
                </a>
            </div>
        </div>
    </div>
@endsection
