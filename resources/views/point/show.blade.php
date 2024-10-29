@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Detalle del Punto</h1>
    <div class="bg-white p-6 rounded shadow-md">
        <p><strong>ID:</strong> {{ $point->id }}</p>
        <p><strong>Usuario ID:</strong> {{ $point->user_id }}</p>
        <p><strong>Monto:</strong> {{ $point->amount }}</p>
        <p><strong>Fecha de Carga:</strong> {{ $point->load_date }}</p>
    </div>
    <a href="{{ route('point.index') }}" class="mt-4 inline-block bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Volver</a>
</div>
@endsection
