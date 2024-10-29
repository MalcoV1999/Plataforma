<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Laravel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="dark bg-gray-100">
    <!-- Navbar -->
    <nav class="fixed top-0 w-full bg-white shadow dark:bg-gray-800 z-50">
        <div class="container flex items-center justify-between px-6 py-4 mx-auto">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M13 7H7v6h6V7z" />
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm0-18C4.477 0 0 4.477 0 10s4.477 10 10 10 10-4.477 10-10S15.523 0 10 0z" clip-rule="evenodd" />
                </svg>
                <h1 class="ml-4 text-3xl font-semibold text-white">PLATAFORMA</h1>
            </div>
            <div class="hidden md:flex space-x-4">
                <a href="{{ route('home') }}" class="text-gray-700 dark:text-gray-200 hover:text-yellow-400">Home</a>
                <a href="{{ route('user.index') }}" class="text-gray-700 dark:text-gray-200 hover:text-yellow-400">Usuarios</a>
                <a href="{{ route('client.index') }}" class="text-gray-700 dark:text-gray-200 hover:text-yellow-400">Clientes</a>
                <a href="{{ route('purchase.index') }}" class="text-gray-700 dark:text-gray-200 hover:text-yellow-400">Compras</a>
                <a href="{{ route('point.index') }}" class="text-gray-700 dark:text-gray-200 hover:text-yellow-400">Puntos</a>
                <a href="{{ route('category.index') }}" class="text-gray-700 dark:text-gray-200 hover:text-yellow-400">Categorías</a>
                <a href="{{ route('region.index') }}" class="text-gray-700 dark:text-gray-200 hover:text-yellow-400">Regiones</a>
                <a href="{{ route('product.index') }}" class="text-gray-700 dark:text-gray-200 hover:text-yellow-400">Productos</a>
                <a href="{{ route('company.index') }}" class="text-gray-700 dark:text-gray-200 hover:text-yellow-400">Compañías</a>
            </div>
            <div class="flex items-center relative">
                @auth
                    <div class="flex items-center">
                        <span class="mr-2 text-gray-700 dark:text-gray-200 hidden md:block">{{ 'Bienvenido, ' . Auth::user()->name }}</span>
                        <button id="userDropdownButton" class="flex items-center focus:outline-none" aria-haspopup="true" aria-expanded="false" onclick="toggleDropdown()">
                            <div class="w-8 h-8 overflow-hidden border-2 border-gray-400 rounded-full">
                                <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80" class="object-cover w-full h-full" alt="User avatar">
                            </div>
                        </button>
                    </div>
                    <!-- Dropdown -->
                    <div id="userDropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700" onclick="openLogoutModal()">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Cerrar sesión
                        </a>
                    </div>
                    <!-- Logout Modal -->
                    <div id="logoutModal" role="dialog" aria-modal="true" class="fixed inset-0 flex items-center justify-center hidden bg-gray-900 bg-opacity-50">
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-full max-w-sm">
                            <h5 class="text-lg font-semibold text-gray-900 dark:text-gray-100">¿Cerrar Sesión?</h5>
                            <p class="mt-2 text-gray-600 dark:text-gray-400">Seleccione "Cerrar sesión" a continuación para finalizar su sesión actual.</p>
                            <div class="mt-4 flex justify-end space-x-4">
                                <a href="{{ route('logout') }}" class="px-4 py-2 border border-gray-300 rounded-lg dark:border-gray-600 text-gray-700 dark:text-gray-300">Cerrar sesión</a>
                                <button type="button" class="px-4 py-2 border border-gray-300 rounded-lg dark:border-gray-600 text-gray-700 dark:text-gray-300" onclick="closeLogoutModal()">Cancelar</button>
                            </div>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="flex h-screen">
        <aside id="sidebar" class="fixed top-0 left-0 w-64 bg-gray-800 text-white h-full z-40">
            <div class="p-4 pt-20 space-y-2">
                <h1 class="text-lg font-semibold">Navegación</h1>
                <a href="{{ route('home') }}" class="block text-gray-300 hover:bg-gray-700 p-2 rounded">Home</a>
                <a href="{{ route('user.index') }}" class="block text-gray-300 hover:bg-gray-700 p-2 rounded">Usuarios</a>
                <a href="{{ route('client.index') }}" class="block text-gray-300 hover:bg-gray-700 p-2 rounded">Clientes</a>
                <a href="{{ route('purchase.index') }}" class="block text-gray-300 hover:bg-gray-700 p-2 rounded">Compras</a>
                <a href="{{ route('point.index') }}" class="block text-gray-300 hover:bg-gray-700 p-2 rounded">Puntos</a>
                <a href="{{ route('category.index') }}" class="block text-gray-300 hover:bg-gray-700 p-2 rounded">Categorías</a>
                <a href="{{ route('region.index') }}" class="block text-gray-300 hover:bg-gray-700 p-2 rounded">Regiones</a>
                <a href="{{ route('product.index') }}" class="block text-gray-300 hover:bg-gray-700 p-2 rounded">Productos</a>
                <a href="{{ route('company.index') }}" class="block text-gray-300 hover:bg-gray-700 p-2 rounded">Compañías</a>
            </div>
            <button onclick="toggleSidebar()" class="absolute bottom-4 left-4 p-2 bg-gray-800 text-white">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19L7 12l8-7" />
                </svg>                  
            </button>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 ml-64 p-4 md:p-6 lg:p-8 mt-16">
            <div class="flex-1 text-base md:text-lg lg:text-xl">
                @yield('content')
            </div>
        </main>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        // Toggle functions for Dropdown and Modal
        function toggleDropdown() {
            document.getElementById("userDropdownMenu").classList.toggle("hidden");
        }
        function openLogoutModal() {
            document.getElementById("logoutModal").classList.remove("hidden");
        }
        function closeLogoutModal() {
            document.getElementById("logoutModal").classList.add("hidden");
        }
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("-translate-x-full");
        }
    </script>
</body>
</html>
