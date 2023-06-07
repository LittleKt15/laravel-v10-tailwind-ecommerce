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
    <div class="flex flex-col md:flex-row min-h-screen">
        <!-- Sidebar -->
        <div id="sidebar" class="md:w-1/6 bg-gray-900 text-white flex flex-col justify-between">
            <div class="p-4">
                <a href="{{ url('/index') }}">
                    <h1 class="text-2xl font-bold text-center">E-Shirts</h1>
                </a>
            </div>
            <nav class="mt-4 h-auto">
                <a class="block py-2 px-4 text-sm font-semibold" href="{{ url('/index') }}">Dashboard</a>
                <a class="block py-2 px-4 text-sm font-semibold" href="{{ url('/categories') }}">Category</a>
                <a class="block py-2 px-4 text-sm font-semibold" href="#">Products</a>
                <a class="block py-2 px-4 text-sm font-semibold" href="#">Orders</a>
                <a class="block py-2 px-4 text-sm font-semibold" href="#">Users</a>
            </nav>

            <div class="mt-auto hidden md:block">
                <a class="block py-2 px-4 text-sm font-semibold text-xl" href="#">Setting</a>
                <div class="text-center">
                    <button id="sidebar-toggle" class="text-white px-3 py-2 rounded-md shadow">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                d="M2 5h20a1 1 0 010 2H2a1 1 0 010-2zm0 6h20a1 1 0 010 2H2a1 1 0 010-2zm0 6h20a1 1 0 010 2H2a1 1 0 010-2z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <!-- Navbar -->
            <nav class="flex justify-between items-center bg-white p-4 shadow">
                <div>
                    <h1 class="text-xl font-semibold">@yield('sub-title')</h1>
                </div>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <div>
                        <a class="text-gray-600 hover:text-gray-900 px-4" href="#">Profile</a>
                        {{-- <a class="text-gray-600 hover:text-gray-900 px-4" href="#">Settings</a> --}}
                        <button class="text-red-600 hover:text-red-900 px-4"
                            onclick="return confirm('Are you sure you want to logout')">Logout</button>
                    </div>
                </form>
            </nav>

            <!-- Content -->
            <div class="mt-4 bg-white p-6 shadow">
                @yield('content')
            </div>
        </div>
    </div>

    <script>
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const sidebar = document.getElementById('sidebar');

        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('md:w-1/6');
            sidebar.classList.toggle('w-1/12');
        });
    </script>
    @yield('script')
</body>

</html>
