document.addEventListener('DOMContentLoaded', function () {
    // 1. Ambil elemen wadah peta dan URL API dari atribut data HTML
    const mapElement = document.getElementById('map');
    if (!mapElement) return;

    const apiUrl = mapElement.getAttribute('data-api-url');

    // 2. Inisialisasi peta awal (Fokus area tengah Indonesia)
    const map = L.map('map').setView([-2.5489, 118.0149], 5);

    // 3. Tambahkan Basemap OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    const sungaiLayer = L.geoJSON(null, {
        pointToLayer: function (feature, latlng) {
            const hasName = Boolean(feature.properties.nama);

            return L.circleMarker(latlng, {
                radius: hasName ? 7 : 4,
                opacity: 1,
                fillOpacity: hasName ? 0.9 : 0.4
            });
        },
        onEachFeature: function (feature, layer) {
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
                    </div>
                `;
                layer.bindPopup(htmlPopup);

                // TAMBAHKAN EVENT LISTENER KLIK DI SINI
                layer.on('click', function () {
                    // 1. Update Teks di Sidebar
                    const elNama = document.getElementById('sungai-nama');
                    const elTipe = document.getElementById('sungai-tipe');
                    const elAlamat = document.getElementById('sungai-alamat');
                    const elStatus = document.getElementById('sungai-status');

                    if(elNama) elNama.textContent = nama;
                    if(elTipe) elTipe.textContent = tipe.toUpperCase();
                    if(elAlamat) elAlamat.textContent = alamat;
                    if(elStatus) elStatus.textContent = status;

                    // 2. Update URL Tombol dengan Route Dinamis
                    const btnLapor = document.getElementById('tombol-lapor');
                    if (btnLapor) {
                        // Simpan template URL asli (yang ada __ID__ nya) ke dalam atribut data sementara
                        // Hal ini penting agar jika marker di-klik berkali-kali, URL template tidak hilang
                        if (!btnLapor.dataset.urlTemplate) {
                            btnLapor.dataset.urlTemplate = btnLapor.getAttribute('href');
                        }

                        // Ambil template, lalu ganti kata id Placeholder dengan id sebenarnya
                        const urlBaru = btnLapor.dataset.urlTemplate.replace('__ID__', id);
                        
                        // Setel URL yang sudah valid ke href tombol
                        btnLapor.setAttribute('href', urlBaru);
                    }
                });
            }
        }
    }).addTo(map);

    // 5. Fungsi Utama AJAX Bounding Box
    function loadDataSungai() {
        const bounds = map.getBounds();
        const zoom = map.getZoom();

        const sw = bounds.getSouthWest();
        const ne = bounds.getNorthEast();

        // Gabungkan base URL API dengan parameter koordinat layar
        const urlWithParams = `${apiUrl}?swLat=${sw.lat}&swLng=${sw.lng}&neLat=${ne.lat}&neLng=${ne.lng}&zoom=${zoom}`;

        fetch(urlWithParams, {
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"').getAttribute('content'),
                'Content-Type': 'application/json'
            },
        })
            .then(response => response.json())
            .then(data => {
                sungaiLayer.clearLayers(); // Bersihkan garis lama di luar layar
                sungaiLayer.addData(data);  // Gambar garis baru yang terlihat
            })
            .catch(error => console.error('Gagal memuat data spasial sungai:', error));
    }

    // 6. Jalankan ulang AJAX setiap kali peta selesai digeser/di-zoom
    map.on('moveend', loadDataSungai);

    // Pemicu pertama kali saat web dibuka
    loadDataSungai();
});