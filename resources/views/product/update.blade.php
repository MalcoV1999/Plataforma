@extends('layouts.app')

@section('title', 'Actualizar Producto')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Editar Producto</h1>
    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-gray-700">Nombre</label>
            <input type="text" name="name" class="w-full border-gray-300 rounded px-4 py-2" value="{{ old('name', $product->name) }}" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">SKU</label>
            <input type="text" name="sku" class="w-full border-gray-300 rounded px-4 py-2" value="{{ old('sku', $product->sku) }}" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Estado</label>
            <select name="status" class="w-full border-gray-300 rounded px-4 py-2">
                <option value="1" {{ $product->status ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ !$product->status ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Imagen</label>
            <input type="file" name="image" class="w-full border-gray-300 rounded px-4 py-2">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Precio en Puntos</label>
            <input type="number" name="points_price" class="w-full border-gray-300 rounded px-4 py-2" value="{{ old('points_price', $product->points_price) }}">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Categoría</label>
            <select name="category_id" class="w-full border-gray-300 rounded px-4 py-2" required>
                @foreach ($category as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Región</label>
            <select name="region_id" class="w-full border-gray-300 rounded px-4 py-2" required>
                @foreach ($region as $region)
                    <option value="{{ $region->id }}" {{ $product->region_id == $region->id ? 'selected' : '' }}>{{ $region->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Actualizar</button>
    </form>
</div>
@endsection
