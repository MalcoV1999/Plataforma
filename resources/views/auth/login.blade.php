@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
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
        <h2 class="text-3xl font-bold text-teal-600 text-center mb-6">Iniciar Sesión</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4 relative">
                <label for="email" class="block text-gray-700">Correo Electrónico</label>
                <div class="flex items-center border border-gray-300 rounded-md">
                    <div class="p-2 text-teal-600">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                           placeholder="Ingrese su correo"
                           class="w-full px-4 py-2 mt-2 border-none focus:outline-none focus:ring-2 focus:ring-teal-600 focus:border-transparent @error('email') border-red-500 @enderror" />
                </div>
                @error('email')
                    <span class="text-red-500 text-sm mt-1" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-6 relative">
                <label for="password" class="block text-gray-700">Contraseña</label>
                <div class="flex items-center border border-gray-300 rounded-md">
                    <div class="p-2 text-teal-600">
                        <i class="fas fa-lock"></i>
                    </div>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                           placeholder="Ingrese su contraseña"
                           class="w-full px-4 py-2 mt-2 border-none focus:outline-none focus:ring-2 focus:ring-teal-600 focus:border-transparent @error('password') border-red-500 @enderror" />
                </div>
                @error('password')
                    <span class="text-red-500 text-sm mt-1" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <input class="form-check-input mr-2 text-teal-600" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="text-gray-600" for="remember">Recuérdame</label>
                </div>
                @if (Route::has('password.request'))
                    <a class="text-sm text-teal-600 hover:underline" href="{{ route('password.request') }}">
                        ¿Olvidaste tu contraseña?
                    </a>
                @endif
            </div>

            <button type="submit"
                    class="w-full bg-teal-600 text-white py-2 px-4 rounded-md hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-600 focus:ring-opacity-50 mt-6">
                Iniciar Sesión
            </button>
        </form>

        <p class="mt-6 text-center text-gray-600">¿No tienes una cuenta? 
            <a href="{{ route('register') }}" class="text-teal-600 hover:underline">Regístrate aquí</a>
        </p>
    </div>
</body>
</html>
@endsection
