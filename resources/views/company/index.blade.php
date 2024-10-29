@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">{{ __('Lista de Empresas') }}</h1>
    <a href="{{ route('company.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">{{ __('Agregar Empresa') }}</a>
    <div class="mt-4">
        <table class="min-w-full bg-white border border-gray-200 rounded shadow-md">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-4 border-b">{{ __('ID') }}</th>
                    <th class="py-2 px-4 border-b">{{ __('Nombre') }}</th>
                    <th class="py-2 px-4 border-b">{{ __('RUC') }}</th>
                    <th class="py-2 px-4 border-b">{{ __('Estado') }}</th>
                    <th class="py-2 px-4 border-b">{{ __('Logo') }}</th>
                    <th class="py-2 px-4 border-b">{{ __('Acciones') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $company->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $company->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $company->ruc }}</td>
                    <td class="py-2 px-4 border-b">{{ $company->status ? 'Activo' : 'Inactivo' }}</td>
                    <td class="py-2 px-4 border-b">
                        @if ($company->logo)
                            <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }}" class="w-16 h-auto">
                        @else
                            {{ __('Sin logo') }}
                        @endif
                    </td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('company.show', $company->id) }}" class="text-blue-500 hover:underline">{{ __('Ver') }}</a> |
                        <a href="{{ route('company.indexupdate', $company->id) }}" class="text-green-500 hover:underline">{{ __('Editar') }}</a> |
                        <form action="{{ route('company.delete', $company->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">{{ __('Eliminar') }}</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
