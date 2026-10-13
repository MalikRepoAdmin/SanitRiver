@extends('map.layouts.app')

@section('title', 'Peta Sungai - Sungai Bersih')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/map-style.css') }}">
    {{-- Leaflet CSS untuk peta --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
@endpush

@section('content')

    <div class="map-page">

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

    {{-- Script map sungai --}}
    <script src="{{ asset('js/sungai-map.js') }}"></script>
@endpush
