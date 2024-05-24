<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel CRUD') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900 p-4">
            <div class="w-full max-w-6xl flex items-center justify-center gap-x-4 md:gap-x-8 lg:gap-x-20 p-8 lg:p-20 bg-white dark:bg-gray-800 shadow-lg rounded-lg relative">
                <h1 class="absolute -top-4 left-4 text-2xl font-black text-gray-700 dark:text-gray-400 bg-gray-100 dark:bg-gray-900 px-2 rounded-lg">Laravel CRUD</h1>    
                {{ $slot }}   
            </div>
        </div>
    </body>
</html>

