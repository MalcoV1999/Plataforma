@extends('layouts.app')

@section('title', 'Crear Usuario')

@section('content')
    <div class="container mx-auto p-6 bg-white shadow-md rounded-md">
        <h1 class="text-3xl font-bold mb-6 text-gray-700">{{ __('Crear Usuario') }}</h1>

        <form action="{{ route('user.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700" for="name">
                    {{ __('Nombre') }}
                </label>
                <input type="text" name="name" id="name" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700" for="username">
                    {{ __('Nombre de Usuario') }}
                </label>
                <input type="text" name="username" id="username"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700" for="email">
                    {{ __('Email') }}
                </label>
                <input type="email" name="email" id="email" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700" for="phone">
                    {{ __('Teléfono') }}
                </label>
                <input type="text" name="phone" id="phone"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700" for="password">
                    {{ __('Contraseña') }}
                </label>
                <input type="password" name="password" id="password" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700" for="password_confirmation">
                    {{ __('Confirmar Contraseña') }}
                </label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700" for="role">
                    {{ __('Rol') }}
                </label>
                <select name="role" id="role" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="inline-flex items-center">
                    <input type="checkbox" name="status" value="active"
                        class="form-checkbox border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500">
                    <span class="ml-2 text-sm text-gray-700">{{ __('Activo') }}</span>
                </label>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    {{ __('Crear Usuario') }}
                </button>
                <a href="{{ route('user.index') }}"
                    class="inline-block text-blue-500 hover:text-blue-700 text-sm font-semibold">
                    {{ __('Regresar') }}
                </a>
            </div>
        </form>
    </div>
@endsection
