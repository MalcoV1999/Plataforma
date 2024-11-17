@extends('layouts.app')

@section('title', 'Lista de Usuarios')

@section('content')
    <div class="container mx-auto p-6 bg-white shadow-md rounded-md">
        <h1 class="text-3xl font-bold mb-6 text-gray-700">{{ __('Lista de Usuarios') }}</h1>

        <!-- Botón para agregar un nuevo usuario -->
        <div class="mb-6 flex justify-end">
            <a href="{{ route('user.create') }}"
                class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                {{ __('Agregar Usuario') }}
            </a>
        </div>

        <!-- Tabla de usuarios -->
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 divide-y divide-gray-300 rounded-lg">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">{{ __('ID') }}</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">{{ __('Nombre') }}</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">{{ __('Email') }}</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">{{ __('Rol Actual') }}</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">{{ __('Estado') }}</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">{{ __('Acciones') }}</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($users as $user)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $user->id }}</td>
                            <td class="px-6 py-4 text-sm font-semibold text-gray-800">{{ $user->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $user->email }}</td>
                            <td class="px-6 py-4">
                                <!-- Mostrar roles actuales -->
                                @foreach ($user->getRoleNames() as $role)
                                    <span class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded">
                                        {{ $role }}
                                    </span>
                                @endforeach
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $user->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ ucfirst($user->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm space-y-2">
                                <!-- Botón para mostrar -->
                                <a href="{{ route('user.show', $user->id) }}" class="inline-block px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                                    {{ __('Mostrar') }}
                                </a>
                                <!-- Botón para editar -->
                                <a href="{{ route('user.edit', $user->id) }}" class="inline-block px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">
                                    {{ __('Editar') }}
                                </a>
                                <!-- Formulario para eliminar -->
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-block px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">
                                        {{ __('Eliminar') }}
                                    </button>
                                </form>
                                <!-- Formulario para asignar rol -->
                                <form action="{{ route('user.assignRole', $user->id) }}" method="POST" class="inline-block mt-2">
                                    @csrf
                                    <div class="flex items-center space-x-2">
                                        <select name="role" class="border-gray-300 rounded-md text-sm focus:ring-blue-500 focus:border-blue-500">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">
                                            {{ __('Asignar Rol') }}
                                        </button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
