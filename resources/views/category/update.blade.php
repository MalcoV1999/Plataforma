@extends('layouts.app')

@section('title', 'Actualizar Categoría')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">{{ __('Actualizar Categoría') }}</h1>

        <form action="{{ route('category.update', $category->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    {{ __('Nombre Categoría') }}
                </label>
                <input type="text" name="name" id="name" value="{{ $category->name }}" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                    {{ __('Imagen') }}
                </label>
                <input type="file" name="image" id="image" accept="image/*"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <p class="mt-2 text-gray-500 text-sm">{{ __('Dejar vacío si no deseas cambiar la imagen.') }}</p>
            </div>
            <div class="mb-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="status" value="1" class="form-checkbox" {{ $category->status ? 'checked' : '' }}>
                    <span class="ml-2 text-gray-700">{{ __('Activo') }}</span>
                </label>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    {{ __('Actualizar Categoría') }}
                </button>
                <a href="{{ route('category.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    {{ __('Regresar') }}
                </a>
            </div>
        </form>
    </div>
@endsection
