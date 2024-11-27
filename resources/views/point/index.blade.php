@extends('layouts.app')

@section('title', 'Lista de Puntos')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">{{ __('Lista de Puntos') }}</h1>

        <div class="mb-4">
            <a href="{{ route('point.create') }}"
                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none">
                {{ __('Agregar Punto') }}
            </a>
        </div>

        <table class="min-w-full table-auto">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 text-left">{{ __('ID') }}</th>
                    <th class="px-4 py-2 text-left">{{ __('Usuario ID') }}</th>
                    <th class="px-4 py-2 text-left">{{ __('Cantidad') }}</th>
                    <th class="px-4 py-2 text-left">{{ __('Fecha de Carga') }}</th>
                    <th class="px-4 py-2 text-left">{{ __('Acciones') }}</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach ($points as $point)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $point->id }}</td>
                        <td class="px-4 py-2">{{ $point->user_id }}</td>
                        <td class="px-4 py-2">{{ $point->amount }}</td>
                        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($point->load_date)->format('Y-m-d') }}</td>
                        <td class="px-4 py-2 flex space-x-2">
                            <a href="{{ route('point.show', $point->id) }}" class="px-2 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600">{{ __('Mostrar') }}</a>
                            <a href="{{ route('point.edit', $point->id) }}" class="px-2 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">{{ __('Editar') }}</a>
                            <form action="{{ route('point.destroy', $point->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-2 py-1 bg-red-500 text-white rounded-md hover:bg-red-600">
                                {{ __('Eliminar') }}
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
