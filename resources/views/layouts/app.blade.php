<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $header }} - {{ config('app.name', 'LaraQuiz') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Content -->
            <div class="py-6">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-2">
                    {{ $slot }}
                </div>
            </div>
        </div>

        @stack('modals')

        @livewireScripts
    </body>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
    @isset($script)
    {{ $script }}
    @endisset
</html>
