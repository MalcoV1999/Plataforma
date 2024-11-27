@extends('layouts.app')

@section('title', 'Editar Compañía')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">{{ __('Editar Compañía') }}</h1>

        <form action="{{ route('company.update', $company->id) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    {{ __('Nombre Compañía') }}
                </label>
                <input type="text" name="name" id="name" value="{{ $company->name }}" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="ruc">
                    {{ __('RUC') }}
                </label>
                <input type="text" name="ruc" id="ruc" value="{{ $company->ruc }}" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="logo">
                    {{ __('Logo Actual') }}
                </label>
                @if ($company->logo)
                    <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo actual" class="mb-4" style="width: 150px; height: auto;">
                @endif
                <label class="block text-gray-700 text-sm font-bold mb-2" for="logo">
                    {{ __('Actualizar Logo') }}
                </label>
                <input type="file" name="logo" id="logo" accept="image/*"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="status" value="1" class="form-checkbox" {{ $company->status ? 'checked' : '' }}>
                    <span class="ml-2 text-gray-700">{{ __('Activo') }}</span>
                </label>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    {{ __('Guardar Cambios') }}
                </button>
                <a href="{{ route('company.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    {{ __('Regresar') }}
                </a>
            </div>
        </form>
    </div>
@endsection
