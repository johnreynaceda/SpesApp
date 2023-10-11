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
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @wireUiScripts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts
    @stack('scripts')
</head>

<body class="font-sans text-gray-900 antialiased relative">
    <x-dialog z-index="z-50" blur="md" align="center" />
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-400">

        <h1 class="text-3xl font-semibold text-gray-800">Department of Labor and Employment XII</h1>

        <div class="w-full sm:max-w-lg mt-8 px-6 py-8 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
        <div class="absolute -bottom-40 -left-40">
            <img src="{{ asset('images/spes_logo.png') }}" class="opacity-10 " alt="">
        </div>
    </div>
</body>

</html>
