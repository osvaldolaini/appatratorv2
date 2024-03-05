<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">

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
        [x-cloak] {
            display: none !important;
        }
    </style>

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-white dark:text-gray-200 dark:bg-gray-900 ">
        <x-app-header></x-app-header>
        <div>
            <main class="pt-24 max-h-screen overflow-auto">
                @if (Auth::user()->contest)
                    @if (Auth::user()->contest->cycles == 0)
                        <x-app-side-bar-mentoring-week>
                            {{ $slot }}
                        </x-app-side-bar-mentoring-week>
                    @else
                        <x-app-side-bar-mentoring-cycle>
                            {{ $slot }}
                        </x-app-side-bar-mentoring-cycle>
                    @endif
                @else
                    <x-app-side-bar-mentoring-week>
                        {{ $slot }}
                    </x-app-side-bar-mentoring-week>
                @endif

            </main>
        </div>
    </div>
    @stack('modals')
    @livewireScripts

    @yield('scripts')
</body>

</html>
