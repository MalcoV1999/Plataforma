@extends('layouts.app')

@section('title', 'Lista de Compañías')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">{{ __('Lista de Compañías') }}</h1>

    <div class="mb-4">
        <a href="{{ route('company.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none">
            {{ __('Agregar Compañía') }}
        </a>
    </div>

    <table class="min-w-full table-auto">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2 text-left">{{ __('ID') }}</th>
                <th class="px-4 py-2 text-left">{{ __('Nombre') }}</th>
                <th class="px-4 py-2 text-left">{{ __('RUC') }}</th>
                <th class="px-4 py-2 text-left">{{ __('Estado') }}</th>
                <th class="px-4 py-2 text-left">{{ __('Logo') }}</th>
                <th class="px-4 py-2 text-left">{{ __('Acciones') }}</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @foreach ($companies as $company)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $company->id }}</td>
                    <td class="px-4 py-2">{{ $company->name }}</td>
                    <td class="px-4 py-2">{{ $company->ruc }}</td>
                    <td class="px-4 py-2">{{ $company->status ? __('Activo') : __('Inactivo') }}</td>
                    <td class="px-4 py-2">
                        @if($company->logo)
                            <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" style="width: 50px; height: auto;">
                        @else
                            {{ __('Sin Logo') }}
                        @endif
                    </td>
                    <td class="px-4 py-2 flex space-x-2">
                        <a href="{{ route('company.show', $company->id) }}" class="px-2 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600">{{ __('Mostrar') }}</a>
                        <a href="{{ route('company.indexupdate', $company->id) }}" class="px-2 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">{{ __('Editar') }}</a>
                        <form action="{{ route('company.delete', $company->id) }}" method="POST" class="inline">
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
