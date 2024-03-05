<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <x-favicons></x-favicons>
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @yield('styles')
        <style>
            [x-cloak] { display: none !important; }
        </style>

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-white dark:bg-stone-900">
                <x-app-header></x-app-header>
                <div >
                    <!-- Add content here, remove div below -->
                    <main class="pt-24 bg-white dark:bg-stone-900 max-h-screen " >
                        <x-app-side-bar-questions>
                            {{ $slot }}
                        </x-app-side-bar-questions>
                    </main>
                </div> <!-- Sidebar Backdrop -->
                <x-app-footer-small-questions></x-app-footer-small-questions>
        </div>
        @stack('modals')
        @livewireScripts

        @yield('scripts')
    </body>
</html>
