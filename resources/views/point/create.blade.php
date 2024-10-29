@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Agregar Punto</h1>
    <form action="{{ route('point.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Usuario ID</label>
            <input type="text" name="user_id" class="w-full border-gray-300 rounded px-4 py-2" value="{{ old('user_id') }}" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Monto</label>
            <input type="number" name="amount" class="w-full border-gray-300 rounded px-4 py-2" value="{{ old('amount') }}" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Fecha de Carga</label>
            <input type="date" name="load_date" class="w-full border-gray-300 rounded px-4 py-2" value="{{ old('load_date') }}" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Guardar</button>
    </form>
</div>
@endsection
