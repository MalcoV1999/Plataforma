@extends('layouts.app')

@section('title', 'Lista de Clientes')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">{{ __('Lista de Clientes') }}</h1>

        <div class="mb-4">
            <a href="{{ route('client.create') }}"
                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none">
                {{ __('Agregar Cliente') }}
            </a>
        </div>

        <table class="min-w-full table-auto">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 text-left">{{ __('ID') }}</th>
                    <th class="px-4 py-2 text-left">{{ __('Nombre') }}</th>
                    <th class="px-4 py-2 text-left">{{ __('Apellido') }}</th>
                    <th class="px-4 py-2 text-left">{{ __('DNI') }}</th>
                    <th class="px-4 py-2 text-left">{{ __('Email') }}</th>
                    <th class="px-4 py-2 text-left">{{ __('Teléfono') }}</th>
                    <th class="px-4 py-2 text-left">{{ __('Dirección') }}</th>
                    <th class="px-4 py-2 text-left">{{ __('Región') }}</th>
                    <th class="px-4 py-2 text-left">{{ __('Acciones') }}</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach ($clients as $client)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $client->id }}</td>
                        <td class="px-4 py-2">{{ $client->name }}</td>
                        <td class="px-4 py-2">{{ $client->last_name }}</td>
                        <td class="px-4 py-2">{{ $client->dni }}</td>
                        <td class="px-4 py-2">{{ $client->email }}</td>
                        <td class="px-4 py-2">{{ $client->phone }}</td>
                        <td class="px-4 py-2">{{ $client->address }}</td>
                        <td class="px-4 py-2">{{ $client->region }}</td>
                        <td class="px-4 py-2 flex space-x-2">
                            <a href="{{ route('client.show', $client->id) }}" class="px-2 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600">{{ __('Mostrar') }}</a>
                            <a href="{{ route('client.indexupdate', $client->id) }}" class="px-2 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">{{ __('Editar') }}</a>
                            <form action="{{ route('client.delete', $client->id) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="px-2 py-1 bg-red-500 text-white rounded-md hover:bg-red-600">{{ __('Eliminar') }}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
