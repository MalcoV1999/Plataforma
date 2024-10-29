@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">{{ __('Lista de Puntos') }}</h1>
    <a href="{{ route('point.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Agregar Punto</a>
    <div class="mt-4">
        <table class="min-w-full bg-white border border-gray-200 rounded shadow-md">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-4 border-b">{{ __('ID') }}</th>
                    <th class="py-2 px-4 border-b">{{ __('Usuario ID') }}</th>
                    <th class="py-2 px-4 border-b">{{ __('Monto') }}</th>
                    <th class="py-2 px-4 border-b">{{ __('Fecha de Carga') }}</th>
                    <th class="py-2 px-4 border-b">{{ __('Acciones') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($points as $point)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $point->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $point->user_id }}</td>
                    <td class="py-2 px-4 border-b">{{ $point->amount }}</td>
                    <td class="py-2 px-4 border-b">{{ $point->load_date->format('d/m/Y') }}</td> <!-- Formateo de la fecha -->
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('point.show', $point->id) }}" class="text-blue-500 hover:underline">{{ __('Ver') }}</a> |
                        <a href="{{ route('point.edit', $point->id) }}" class="text-green-500 hover:underline">{{ __('Editar') }}</a> |
                        <form action="{{ route('point.delete', $point->id) }}" method="POST" class="inline">
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
