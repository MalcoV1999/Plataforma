@extends('layouts.app')

@section('title', 'Editar Producto')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Editar Producto</h1>
    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700" for="name">Nombre</label>
            <input type="text" name="name" id="name" class="w-full border-gray-300 rounded px-4 py-2" value="{{ old('name', $product->name) }}" required>
            @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700" for="sku">SKU</label>
            <input type="text" name="sku" id="sku" class="w-full border-gray-300 rounded px-4 py-2" value="{{ old('sku', $product->sku) }}" required>
            @error('sku')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700" for="status">Estado</label>
            <select name="status" id="status" class="w-full border-gray-300 rounded px-4 py-2">
                <option value="1" {{ $product->status ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ !$product->status ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700" for="image">Imagen</label>
            <input type="file" name="image" id="image" class="w-full border-gray-300 rounded px-4 py-2">
            @error('image')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700" for="points_price">Precio en Puntos</label>
            <input type="number" name="points_price" id="points_price" class="w-full border-gray-300 rounded px-4 py-2" value="{{ old('points_price', $product->points_price) }}">
            @error('points_price')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700" for="category_id">Categoría</label>
            <select name="category_id" id="category_id" class="w-full border-gray-300 rounded px-4 py-2" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700" for="region_id">Región</label>
            <select name="region_id" id="region_id" class="w-full border-gray-300 rounded px-4 py-2" required>
                @foreach ($regions as $region)
                    <option value="{{ $region->id }}" {{ $product->region_id == $region->id ? 'selected' : '' }}>{{ $region->name }}</option>
                @endforeach
            </select>
            @error('region_id')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Actualizar</button>
        <a href="{{ route('product.index') }}" class="ml-4 inline-block bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancelar</a>
    </form>
</div>
@endsection
