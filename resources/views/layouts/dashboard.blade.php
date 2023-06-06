<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- TailwindCSS Link --}}
    @vite('resources/css/app.css')

    <title>@yield('title')</title>
</head>

<body class="bg-gray-200">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-1/5 bg-gray-900 text-white">
            <div class="p-4">
                <div class="flex items-center justify-between">
                    <h1 class="text-xl font-bold">Admin Dashboard</h1>
                    <button id="sidebar-toggle"
                        class="focus:outline-none focus:text-white text-gray-500 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h8m-8 6h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <nav class="mt-4">
                <a class="block py-2 px-4 text-sm font-semibold" href="#">Dashboard</a>
                <a class="block py-2 px-4 text-sm font-semibold" href="#">Users</a>
                <a class="block py-2 px-4 text-sm font-semibold" href="#">Products</a>
                <a class="block py-2 px-4 text-sm font-semibold" href="#">Orders</a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <!-- Navbar -->
            <nav class="flex justify-between items-center bg-white p-4 shadow">
                <div>
                    <h1 class="text-xl font-semibold">Admin Dashboard</h1>
                </div>
                <div>
                    <a class="text-gray-600 hover:text-gray-900 px-4" href="#">Profile</a>
                    <a class="text-gray-600 hover:text-gray-900 px-4" href="#">Settings</a>
                    <a class="text-red-600 hover:text-red-900 px-4" href="#">Logout</a>
                </div>
            </nav>

            <!-- Content -->
            <div class="mt-4 bg-white p-6 shadow">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
    <script>
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const sidebar = document.querySelector('.w-1/5');

        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('hidden');
        });
    </script>
    @yield('script')
</body>

</html>
