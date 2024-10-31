@extends('layouts.app')

@section('title', 'Detalles de Compra')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">{{ __('Detalles de Compra') }}</h1>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-lg font-bold">{{ __('Usuario ID') }}: {{ $purchase->user_id }}</h2>
            <h2 class="text-lg font-bold">{{ __('Producto ID') }}: {{ $purchase->product_id }}</h2>
            <p>{{ __('Cantidad') }}: {{ $purchase->quantity }}</p>
            <p>{{ __('Puntos Usados') }}: {{ $purchase->points_used ?? 'N/A' }}</p>
            <p>{{ __('Fecha') }}: {{ \Carbon\Carbon::parse($purchase->date)->format('Y-m-d') }}</p>
            <div class="mt-4">
                <a href="{{ route('purchase.index') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none">
                    {{ __('Regresar') }}
                </a>
                <a href="{{ route('purchase.indexupdate', $purchase->id) }}" class="inline-block px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">
                    {{ __('Editar') }}
                </a>
            </div>
        </div>
    </div>
@endsection
