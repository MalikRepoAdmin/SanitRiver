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

    // 4. Buat Layer Spasial untuk menampung garis sungai
    const sungaiLayer = L.geoJSON(null, {
        style: function (feature) {
            let warnaGaris = "#FF00FF";
            let tebalGaris = 4;

            if (feature.properties.tipe === 'canal') {
                warnaGaris = "#00FFFF";
                tebalGaris = 3;
            } else if (feature.properties.tipe === 'stream') {
                warnaGaris = "#FFFF00";
                tebalGaris = 2.5;
            }

            return { color: warnaGaris, weight: tebalGaris, opacity: 1.0 };
        },
        onEachFeature: function (feature, layer) {
            if (feature.properties) {
                const id = feature.properties.id;
                const nama = feature.properties.nama || 'Tanpa Nama';
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