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
        @vite(['resources/js/app.js', 'resources/css/app.css'])
    </head>
    <body class="twfont-sans twantialiased">
        <div class="tw-min-h-screen tw-bg-gray-100 tw-dark:tw-bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="tw-bg-white tw-dark:tw-bg-gray-800 tw-shadow">
                    <div class="tw-max-w-7xl tw-mx-auto tw-py-6 tw-px-4 tw-sm:tw-px-6 tw-lg:tw-px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
