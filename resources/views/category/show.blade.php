@extends('layouts.app')

@section('title', 'Detalles Categoria')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">{{ __('Detalles Categoria') }}</h1>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-lg font-bold">{{ __('Name') }}: {{ $category->name }}</h2>
            <p>{{ __('Estado') }}: {{ $category->status ? 'Activo' : 'Inactivo' }}</p>

            @if($category->image)
                <div class="mt-4">
                    <h3 class="text-md font-bold">{{ __('Image') }}:</h3>
                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="mt-2 rounded-md shadow-md">
                </div>
            @endif
            
            <div class="mt-4">
                <a href="{{ route('category.index') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none">
                    {{ __('Regresar') }}
                </a>
            </div>
        </div>
    </div>
@endsection
