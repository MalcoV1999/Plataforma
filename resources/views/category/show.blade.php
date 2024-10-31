@extends('layouts.app')

@section('title', 'Detalles Categoría')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">{{ __('Detalles Categoría') }}</h1>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-lg font-bold">{{ __('Nombre') }}: {{ $category->name }}</h2>
            <p>{{ __('Estado') }}: {{ $category->status ? 'Activo' : 'Inactivo' }}</p>
            @if ($category->image)
                <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="mt-4">
            @endif
            <div class="mt-4">
                <a href="{{ route('category.index') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none">
                    {{ __('Regresar') }}
                </a>
            </div>
        </div>
    </div>
@endsection
