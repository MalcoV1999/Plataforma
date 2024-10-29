<!-- resources/views/product/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Detalle del Producto</h1>
    <div class="bg-white p-6 rounded shadow-md">
        <p><strong>ID:</strong> {{ $product->id }}</p>
        <p><strong>Nombre:</strong> {{ $product->name }}</p>
        <p><strong>SKU:</strong> {{ $product->sku }}</p>
        <p><strong>Estado:</strong> {{ $product->status ? 'Activo' : 'Inactivo' }}</p>
        <p><strong>Precio en Puntos:</strong> {{ $product->points_price }}</p>
        <p><strong>Categoría:</strong> {{ $product->category->name }}</p>
        <p><strong>Región:</strong> {{ $product->region->name }}</p>
    </div>
    <a href="{{ route('product.index') }}" class="mt-4 inline-block bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Volver</a>
</div>
@endsection
