@extends('layouts.app')

@section('title', 'Lista de Usuarios')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">{{ __('Lista de Usuarios') }}</h1>

        <div class="mb-4">
            <a href="{{ route('user.create') }}"
                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none">
                {{ __('Agregar Usuario') }}
            </a>
        </div>

        <table class="min-w-full table-auto">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 text-left">{{ __('ID') }}</th>
                    <th class="px-4 py-2 text-left">{{ __('Nombre') }}</th>
                    <th class="px-4 py-2 text-left">{{ __('Nombre de Usuario') }}</th>
                    <th class="px-4 py-2 text-left">{{ __('Email') }}</th>
                    <th class="px-4 py-2 text-left">{{ __('Teléfono') }}</th>
                    <th class="px-4 py-2 text-left">{{ __('Rol') }}</th>
                    <th class="px-4 py-2 text-left">{{ __('Estado') }}</th>
                    <th class="px-4 py-2 text-left">{{ __('Acciones') }}</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach ($users as $user)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $user->id }}</td>
                        <td class="px-4 py-2">{{ $user->name }}</td>
                        <td class="px-4 py-2">{{ $user->username }}</td>
                        <td class="px-4 py-2">{{ $user->email }}</td>
                        <td class="px-4 py-2">{{ $user->phone }}</td>
                        <td class="px-4 py-2">{{ ucfirst($user->role) }}</td>
                        <td class="px-4 py-2">
                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $user->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ ucfirst($user->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-2 flex space-x-2">
                            <a href="{{ route('user.show', $user->id) }}" class="px-2 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600">{{ __('Mostrar') }}</a>
                            <a href="{{ route('user.indexupdate', $user->id) }}" class="px-2 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">{{ __('Editar') }}</a>
                            <form action="{{ route('user.delete', $user->id) }}" method="POST" class="inline">
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
