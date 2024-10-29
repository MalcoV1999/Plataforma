@extends('layouts.app')

@section('title', 'Detalle de la Compañía')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Detalle de la Compañía</h1>
    <div class="bg-white p-6 rounded shadow-md">
        <p><strong>ID:</strong> {{ $company->id }}</p>
        <p><strong>Nombre:</strong> {{ $company->name }}</p>
        <p><strong>RUC:</strong> {{ $company->ruc }}</p>
        <p><strong>Estado:</strong> {{ $company->status ? 'Activo' : 'Inactivo' }}</p>
        <p><strong>Logo:</strong></p>
        @if($company->logo)
            <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo de {{ $company->name }}" class="w-32 h-32 object-cover mb-4">
        @else
            <p>No hay logo disponible.</p>
        @endif
        <p><strong>Usuario Asociado:</strong> {{ $company->user->first_name }} {{ $company->user->last_name }}</p>
    </div>
    <a href="{{ route('company.index') }}" class="mt-4 inline-block bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Volver</a>
</div>
@endsection
