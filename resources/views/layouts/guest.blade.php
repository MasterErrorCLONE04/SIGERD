<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-gradient-to-b from-gray-50 to-gray-100">
        <div class="min-h-screen flex flex-col items-center justify-center">
            <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
                {{ $slot }}
            </div>

            <p class="mt-6 text-xs text-gray-500 text-center">
                Powered by <span class="font-semibold">{{ config('app.name', 'Laravel') }}</span> © {{ date('Y') }}
            </p>
        </div>
    </body>
</html>
