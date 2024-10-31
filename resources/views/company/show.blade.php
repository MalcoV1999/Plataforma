@extends('layouts.app')

@section('title', 'Detalles Compañía')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">{{ __('Detalles Compañía') }}</h1>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-lg font-bold">{{ __('Nombre') }}: {{ $company->name }}</h2>
            <p>{{ __('RUC') }}: {{ $company->ruc }}</p>
            <p>{{ __('Estado') }}: {{ $company->status ? 'Activo' : 'Inactivo' }}</p>
            @if ($company->logo)
                <div class="mt-4">
                    <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }}" class="w-32 h-32 object-cover rounded">
                </div>
            @endif
            <div class="mt-4">
                <a href="{{ route('company.index') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none">
                    {{ __('Regresar') }}
                </a>
                <a href="{{ route('company.update', $company->id) }}" class="inline-block px-4 py-2 bg-yellow-600 text-white rounded-md hover:bg-yellow-700 focus:outline-none">
                    {{ __('Editar Compañía') }}
                </a>
            </div>
        </div>
    </div>
@endsection
