@extends('layouts.app')

@section('title', __('Lista de Clientes'))

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">{{ __('Lista de Clientes') }}</h1>
    <a href="{{ route('client.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">{{ __('Agregar Cliente') }}</a>
    <div class="mt-4">
        <table class="min-w-full bg-white border border-gray-200 rounded shadow-md">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-4 border-b">{{ __('ID') }}</th>
                    <th class="py-2 px-4 border-b">{{ __('Nombre') }}</th>
                    <th class="py-2 px-4 border-b">{{ __('Apellido') }}</th>
                    <th class="py-2 px-4 border-b">{{ __('Email') }}</th>
                    <th class="py-2 px-4 border-b">{{ __('Teléfono') }}</th>
                    <th class="py-2 px-4 border-b">{{ __('Dirección') }}</th>
                    <th class="py-2 px-4 border-b">{{ __('Región') }}</th>
                    <th class="py-2 px-4 border-b">{{ __('Acciones') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $client->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $client->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $client->last_name }}</td>
                    <td class="py-2 px-4 border-b">{{ $client->email }}</td>
                    <td class="py-2 px-4 border-b">{{ $client->phone }}</td>
                    <td class="py-2 px-4 border-b">{{ $client->address }}</td>
                    <td class="py-2 px-4 border-b">{{ $client->region }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('client.show', $client->id) }}" class="text-blue-500 hover:underline">{{ __('Ver') }}</a> |
                        <a href="{{ route('client.update', $client->id) }}" class="text-green-500 hover:underline">{{ __('Editar') }}</a> |
                        <form action="{{ route('client.delete', $client->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">{{ __('Eliminar') }}</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

