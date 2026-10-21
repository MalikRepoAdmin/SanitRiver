<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Beranda') - SanitRiver</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index-style.css') }}">

    <!-- CSS -->
    <style>
        .map-container {
            width: 100vw;
            height: 100vh;
        }

        #map {
            width: 100%;
            height: 100%;
        }

        .custom-popup h3 {
            margin: 0 0 5px 0;
            color: #007bff;
        }
    </style>
    @livewireStyles()
    @stack('styles')
</head>

<body>

    @include('components.layouts.partials.header')

    {{-- Blank area: every page fills this section --}}
    <main class="page-content">
        {{ $slot }}
    </main>

    @include('components.layouts.partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @livewireScripts
    @stack('scripts')
</body>

</html>
