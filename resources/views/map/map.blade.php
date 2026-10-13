@extends('map.layouts.app')

@section('title', 'Peta Sungai - Sungai Bersih')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/map-style.css') }}">
    {{-- Leaflet CSS untuk peta --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
@endpush

@section('content')

    <div class="map-page">

        {{-- ====== BAGIAN ATAS: SEARCH & FILTER ====== --}}
        @include('map.partials.filter')

        {{-- ====== BAGIAN BAWAH: PETA & INFO ====== --}}
        <div class="map-container">

            {{-- SIDEBAR INFO SUNGAI --}}
            @include('map.partials.sidebar-info')

            {{-- PETA --}}
            <div class="map-area">
                <div id="map" data-api-url="{{ route('api.sungai.bbox') }}">
                </div>
            </div>

        </div>

    </div>

@endsection

@push('scripts')
    {{-- Leaflet JS --}}
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    {{-- <script>
        // Inisialisasi peta dasar
        const map = L.map('map').setView([-6.2088, 106.8456], 12); // Jakarta

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors',
            maxZoom: 19
        }).addTo(map);

        // Contoh marker sungai
        const sungaiMarker = L.marker([-6.2188, 106.8456]).addTo(map);
        sungaiMarker.bindPopup(
            '<strong>Sungai Ciliwung Hilir</strong><br>Status: Bersih<br>IKA 54'
        );

        // Contoh garis sungai (polyline)
        const sungaiLine = L.polyline([
            [-6.2500, 106.8200],
            [-6.2200, 106.8400],
            [-6.2000, 106.8500],
            [-6.1800, 106.8600]
        ], {
            color: '#1a9e8f',
            weight: 4,
            opacity: 0.8
        }).addTo(map);

        sungaiLine.bindPopup('Alur Sungai Ciliwung Hilir');
        
    </script> --}}
    {{-- Script map sungai --}}
    <script src="{{ asset('js/sungai-map.js') }}"></script>
@endpush
