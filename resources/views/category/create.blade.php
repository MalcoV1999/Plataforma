@extends('layouts.app')

@section('title', 'Crear Categoria')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">{{ __('Crear Categoria') }}</h1>

        <form action="{{ route('category.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    {{ __('Nombre Categoria') }}
                </label>
                <input type="text" name="name" id="name" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="status" value="1" class="form-checkbox">
                    <span class="ml-2 text-gray-700">{{ __('Activo') }}</span>
                </label>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                    {{ __('Imagen Categoria') }}
                </label>
                <input type="file" name="image" id="image" 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    {{ __('Crear Category') }}
                </button>
                <a href="{{ route('category.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    {{ __('Regresar') }}
                </a>
            </div>
        </form>
    </div>
@endsection
