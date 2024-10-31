<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Laravel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="dark bg-gray-100">
   

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

