<nav>
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

        <!-- Main content area -->
        <div class="ml-64 flex-grow p-4">
            <!-- Additional Menu -->
            <ul class="wsus__menu_item wsus__menu_item_right flex space-x-4 p-2 bg-gray-100 rounded">
                <li><a href="contact.html" class="text-gray-700 hover:text-gray-900">Contacto</a></li>
                <li><a href="dashboard.html" class="text-gray-700 hover:text-gray-900">Mi</a></li>
                <li><a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900">Iniciar sesión</a></li>
            </ul>

            
        </div>
    </div>
    <!--============================
        MOBILE MENU END
    ==============================-->
</nav>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('hidden');
    }
</script>
