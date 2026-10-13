<div>
    {{-- Live as if you were to die tomorrow. Learn as if you were to live forever. - Mahatma Gandhi --}}


    <!-- CSS Peta Media -->


    <div class="map-container" wire:key="map-container-{{ rand() }}">
        <!-- insert endpoint Laravel into data-api-url attribute -->
        <div id="map" data-api-url="{{ url('/api/sungai-bbox') }}"></div>
    </div>

    <!-- JS Library Peta -->
    @script
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        // 1. Define a global initialization function that Livewire can call safely
        const initLeafletMap = () => {
            const mapElement = document.getElementById('map');

            // Critical check: Ensure the element exists and hasn't already been initialized
            if (!mapElement || mapElement._leaflet_id) return;

            const apiUrl = mapElement.getAttribute('data-api-url');

            // 2. Initialize map (Focus area Indonesia)
            const map = L.map('map').setView([-2.5489, 118.0149], 5);

            // 3. Add Basemap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 18,
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            // 4. Create GeoJSON Layer
            const sungaiLayer = L.geoJSON(null, {
                pointToLayer: function(feature, latlng) {
                    const hasName = Boolean(feature.properties.nama);
                    return L.circleMarker(latlng, {
                        radius: hasName ? 7 : 4,
                        opacity: 1,
                        fillOpacity: hasName ? 0.9 : 0.4
                    });
                },
                onEachFeature: function(feature, layer) {
                    if (feature.properties) {
                        const id = feature.properties.id;
                        const nama = feature.properties.nama || 'Aliran tidak Bernama';
                        const alamat = feature.properties.alamat || 'Tidak ada info wilayah';
                        const status = feature.properties.status || 'Belum Terlapor';
                        const tipe = feature.properties.tipe || 'river';

                        const htmlPopup = `
                            <div class="custom-popup">
                                <h3>💧 Detail Aliran Sungai</h3>
                                <p><b>Nama:</b> ${nama}</p>
                                <p><b>Kategori:</b> ${tipe.toUpperCase()}</p>
                                <p><b>Wilayah:</b> ${alamat}</p>
                                <p><b>Status:</b> ${status}</p>
                                <hr style="margin: 8px 0; border: 0; border-top: 1px solid #ddd;">
                                <a href="/sungai/${id}" style="color: #007bff; text-decoration: none; font-weight: bold; font-size: 12px;">
                                    🔍 Lihat Laporan & Galeri Foto →
                                </a>
                            </div>
                        `;
                        layer.bindPopup(htmlPopup);

                        // FIX: Bind Livewire Dispatch specifically onto each individual layer/feature click event
                        layer.on('click', () => {
                            // In Livewire v3 @script, use \$wire.dispatch instead of window.Livewire.dispatch
                            \
                            $wire.dispatch('river-selected', {
                                sungaiId: feature.properties
                                    .id // Fixed from sungai_id to match your property schema
                            });
                        });
                    }
                }
            }).addTo(map);

            // 5. AJAX Bounding Box Function
            function loadDataSungai() {
                const bounds = map.getBounds();
                const zoom = map.getZoom();
                const sw = bounds.getSouthWest();
                const ne = bounds.getNorthEast();

                const urlWithParams =
                    `${apiUrl}?swLat=${sw.lat}&swLng=${sw.lng}&neLat=${ne.lat}&neLng=${ne.lng}&zoom=${zoom}`;

                fetch(urlWithParams)
                    .then(response => response.json())
                    .then(data => {
                        sungaiLayer.clearLayers();
                        sungaiLayer.addData(data);
                    })
                    .catch(error => console.error('Gagal memuat data spasial sungai:', error));
            }

            // 6. Listeners
            map.on('moveend', loadDataSungai);

            // Execute initial load
            loadDataSungai();
        };

        // RUN LOGIC FOR LIVEWIRE LIFECYCLE Hooks
        initLeafletMap(); // Fire immediately if component is loaded natively

        // Fire whenever navigating via wire:navigate or inside standard SPA transitions
        document.addEventListener('livewire:navigated', initLeafletMap);
    </script>
    @endscript

</div>
