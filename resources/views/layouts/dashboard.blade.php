<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>@yield('title')</title>
</head>

<body class="bg-gray-200">
    <x-nav />

    {{-- <x-sidebar :orders="$orders" /> --}}
    <x-sidebar />

    <div class="px-4 pt-20 pb-10 sm:ml-64">
        <div class="p-4 border-2 border-gray-400 border-dashed rounded-lg dark:border-gray-700">
            <div class="flex items-center justify-center h-auto rounded bg-gray-50">
                @yield('content')
            </div>
        </div>
    </div>

    @yield('script')
</body>

</html>
