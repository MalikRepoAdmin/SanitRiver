<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Peta Sungai Indonesia</title>

    <!-- CSS Peta Media -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <!-- CSS/Tailwind -->
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }

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
</head>

<body>

    <div class="map-container">
        <!-- insert endpoint Laravel into data-api-url attribute -->
        <div id="map" data-api-url="{{ url('/api/sungai-bbox') }}"></div>
    </div>

    <!-- JS Library Peta -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <!-- Script for map and ajax -->
    {{-- @vite(['resources/js/sungai-map.js']) --}}
    <script src="{{ asset('js/sungai-map.js') }}"></script>
</body>

</html>
