@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        input::placeholder {
            color: #2c7a7b;
        }
        body {
            background-image: url('https://wallpapers.com/images/hd/tea-and-snacks-in-the-supermarket-ku50cat4bjq46kn6.jpg');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center">
    <div class="bg-white bg-opacity-80 p-8 rounded-lg shadow-lg max-w-md w-full">
        <h2 class="text-3xl font-bold text-teal-600 text-center mb-6">Registro</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4 relative">
                <label for="name" class="block text-gray-700">Nombre</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                       placeholder="Ingrese su nombre"
                       class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600 @error('name') border-red-500 @enderror">
                @error('name')
                    <span class="text-red-500 text-sm mt-1" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4 relative">
                <label for="email" class="block text-gray-700">Correo Electrónico</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                       placeholder="Ingrese su correo"
                       class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600 @error('email') border-red-500 @enderror">
                @error('email')
                    <span class="text-red-500 text-sm mt-1" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4 relative">
                <label for="password" class="block text-gray-700">Contraseña</label>
                <input id="password" type="password" name="password" required autocomplete="new-password"
                       placeholder="Ingrese su contraseña"
                       class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600 @error('password') border-red-500 @enderror">
                @error('password')
                    <span class="text-red-500 text-sm mt-1" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-6 relative">
                <label for="password-confirm" class="block text-gray-700">Confirmar Contraseña</label>
                <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password"
                       placeholder="Confirme su contraseña"
                       class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600">
            </div>

            <button type="submit"
                    class="w-full bg-teal-600 text-white py-2 px-4 rounded-md hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-600 focus:ring-opacity-50 mt-6">
                Registrarse
            </button>
        </form>

        <p class="mt-6 text-center text-gray-600">¿Ya tienes una cuenta?
            <a href="{{ route('login') }}" class="text-teal-600 hover:underline">Inicia sesión aquí</a>
        </p>
    </div>
</body>
</html>
@endsection
