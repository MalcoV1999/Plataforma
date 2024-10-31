@extends('layouts.app')

@section('title', 'Actualizar Cliente')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">{{ __('Actualizar Cliente') }}</h1>

        <form action="{{ route('client.update', $client->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    {{ __('Nombre') }}
                </label>
                <input type="text" name="name" id="name" value="{{ $client->name }}" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="last_name">
                    {{ __('Apellido') }}
                </label>
                <input type="text" name="last_name" id="last_name" value="{{ $client->last_name }}" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="dni">
                    {{ __('DNI') }}
                </label>
                <input type="text" name="dni" id="dni" value="{{ $client->dni }}" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    {{ __('Email') }}
                </label>
                <input type="email" name="email" id="email" value="{{ $client->email }}" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">
                    {{ __('Teléfono') }}
                </label>
                <input type="text" name="phone" id="phone" value="{{ $client->phone }}" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="address">
                    {{ __('Dirección') }}
                </label>
                <input type="text" name="address" id="address" value="{{ $client->address }}" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="region">
                    {{ __('Región') }}
                </label>
                <input type="text" name="region" id="region" value="{{ $client->region }}" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading
