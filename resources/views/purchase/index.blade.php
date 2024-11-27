@extends('layouts.app')

@section('title', 'Lista de Compras')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">{{ __('Lista de Compras') }}</h1>

        <div class="mb-4">
            <a href="{{ route('purchase.create') }}"
                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none">
                {{ __('Agregar Compra') }}
            </a>
        </div>

        <table class="min-w-full table-auto">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 text-left">{{ __('ID') }}</th>
                    <th class="px-4 py-2 text-left">{{ __('Usuario') }}</th>
                    <th class="px-4 py-2 text-left">{{ __('Producto') }}</th>
                    <th class="px-4 py-2 text-left">{{ __('Cantidad') }}</th>
                    <th class="px-4 py-2 text-left">{{ __('Puntos Usados') }}</th>
                    <th class="px-4 py-2 text-left">{{ __('Fecha') }}</th>
                    <th class="px-4 py-2 text-left">{{ __('Acciones') }}</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach ($purchases as $purchase)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $purchase->id }}</td>
                        <td class="px-4 py-2">{{ $purchase->user->name }}</td>
                        <td class="px-4 py-2">{{ $purchase->product->name }}</td>
                        <td class="px-4 py-2">{{ $purchase->quantity }}</td>
                        <td class="px-4 py-2">{{ $purchase->points_used }}</td>
                        <td class="px-4 py-2">{{ $purchase->date->format('d-m-Y') }}</td>
                        <td class="px-4 py-2 flex space-x-2">
                            <a href="{{ route('purchase.show', parameters: $purchase->id) }}" class="px-2 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600">{{ __('Mostrar') }}</a>
                            <a href="{{ route('purchase.edit', $purchase->id) }}" class="px-2 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">{{ __('Editar') }}</a>
                            <form action="{{ route('purchase.destroy', $purchase->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE') 
                                <button type="submit" class="px-2 py-1 bg-red-500 text-white rounded-md hover:bg-red-600">{{ __('Eliminar') }}</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
