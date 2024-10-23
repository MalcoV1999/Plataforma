<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') Laravel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="dark">
    <nav class="fixed top-0 w-full bg-white shadow dark:bg-gray-800 z-50"> 
        <div class="container flex items-center justify-between px-6 py-4 mx-auto">
            <div class="flex items-center justify-start">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M13 7H7v6h6V7z" />
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm0-18C4.477 0 0 4.477 0 10s4.477 10 10 10 10-4.477 10-10S15.523 0 10 0z" clip-rule="evenodd" />
                </svg>
                <h1 class="ml-4 text-3xl font-semibold tracking-tight text-white">PLATFORM</h1>
            </div>
            <div class="flex items-center mt-4 lg:mt-0 relative">
                @auth
                    <div class="flex items-center relative">
                        <span class="mr-2 text-gray-700 dark:text-gray-200 hidden md:block">{{-- 'Bienvenido, ' . Auth::user()->name --}}</span>
                        <button id="userDropdownButton" type="button" class="flex items-center focus:outline-none" aria-label="toggle profile dropdown" onclick="toggleDropdown()">
                            <div class="w-8 h-8 overflow-hidden border-2 border-gray-400 rounded-full">
                                <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80" class="object-cover w-full h-full" alt="avatar">
                            </div>
                        </button>
                    </div>
                    <div id="userDropdownMenu" class="absolute right-0 top-full mt-2 w-48 py-2 bg-white dark:bg-gray-800 rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden">
                        <a href="#" data-toggle="modal" data-target="#logoutModal" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700" onclick="openLogoutModal()">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Cerrar sesion
                        </a>
                    </div>
                    <div id="logoutModal" class="fixed inset-0 flex items-center justify-center hidden bg-gray-900 bg-opacity-50">
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-full max-w-sm">
                            <h5 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Cerrar Sesión?</h5>
                            <p class="mt-2 text-gray-600 dark:text-gray-400">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</p>
                            <div class="mt-4 flex justify-end space-x-4">
                                <a href="{{-- route('logout') --}}" class="btn btn-outline-secondary px-4 py-2 border border-gray-300 rounded-lg dark:border-gray-600 text-gray-700 dark:text-gray-300">Cerrar sesión</a>
                                <button type="button" class="px-4 py-2 border border-gray-300 rounded-lg dark:border-gray-600 text-gray-700 dark:text-gray-300" onclick="closeLogoutModal()">Cancelar</button>
                            </div>
                        </div>
                    </div>
                @else
                @endauth
            </div>
        </div>
    </nav>
    <div class="flex h-screen">
        <aside id="sidebar" class="fixed top-0 left-0 w-64 bg-gray-800 text-white h-full z-40"> 
            <div class="p-4 pt-20">
                <h1 class="text-lg font-semibold">Mi Sidebar</h1>
                @yield('componets')
            </div>

            <button onclick="toggleSidebar()" class="p-2 bg-gray-800 text-white absolute bottom-4 left-4">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19L7 12l8-7" />
                </svg>                  
            </button> 
        </aside>
        <main class="flex-1 ml-64 p-4 md:p-6 lg:p-8 mt-16">
            <div class="flex-1 text-base md:text-lg lg:text-xl">
                @yield('content')
            </div>
        </main>
        
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
