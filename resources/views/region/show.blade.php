@extends('layouts.app')

@section('title', 'Region Details')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">{{ __('Region Details') }}</h1>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-lg font-bold">{{ __('Name') }}: {{ $region->name }}</h2>
            <p>{{ __('Status') }}: {{ $region->status ? 'Active' : 'Inactive' }}</p>
            <div class="mt-4">
                <a href="{{ route('region.index') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none">
                    {{ __('Back to List') }}
                </a>
            </div>
        </div>
    </div>
@endsection
