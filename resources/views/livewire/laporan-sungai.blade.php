<div class="laporan-page">

    {{-- ====== FILTER & SEARCH ====== --}}
    @include('map.partials.filter-laporan')

    {{-- ====== GRID KARTU LAPORAN ====== --}}
    <div class="laporan-grid">

        @forelse ($laporansungais as $laporan)
            <article class="laporan-card">

                {{-- Gambar Utama --}}
                <div class="laporan-image">
                    @if ($laporan->gambarSungais->first())
                        <img src="{{ asset('storage/' . $laporan->gambarSungais->first()->file_path) }}"
                             alt="{{ $laporan->sungai->nama_sungai ?? 'Sungai' }}">
                    @else
                        <img src="{{ asset('images/beranda-sungai.jpg') }}" alt="Default">
                    @endif
                </div>

                {{-- Konten --}}
                <div class="laporan-body">

                    {{-- Judul + Lokasi --}}
                    <h3 class="laporan-title">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        {{ $laporan->sungai->nama_sungai ?? 'Sungai Tidak Diketahui' }}
                        @if ($laporan->sungai->alamat ?? false)
                            - {{ $laporan->sungai->alamat }}
                        @endif
                    </h3>

                    {{-- Deskripsi --}}
                    <p class="laporan-desc">
                        {{ \Illuminate\Support\Str::limit($laporan->status ?? 'Belum ada deskripsi laporan.', 120) }}
                    </p>

                    {{-- Badge Status --}}
                    @php
                        $statusClass = match (strtolower($laporan->status ?? '')) {
                            'bersih'   => 'badge-bersih',
                            'cukup'    => 'badge-cukup',
                            'tercemar' => 'badge-tercemar',
                            default    => 'badge-default',
                        };
                        $dotClass = match (strtolower($laporan->status ?? '')) {
                            'bersih'   => 'dot-bersih',
                            'cukup'    => 'dot-cukup',
                            'tercemar' => 'dot-tercemar',
                            default    => 'dot-default',
                        };
                    @endphp
                    <span class="badge {{ $statusClass }}">
                        <span class="dot {{ $dotClass }}"></span>
                        {{ $laporan->status ?? 'Belum Terlapor' }}
                    </span>

                    {{-- Footer: User + Tanggal --}}
                    <div class="laporan-footer">
                        <div class="laporan-user">
                            <div class="user-avatar">
                                {{ strtoupper(substr($laporan->user->name ?? 'U', 0, 1)) }}
                            </div>
                            <div class="user-info">
                                <span class="user-name">{{ $laporan->user->name ?? 'Anonim' }}</span>
                                <span class="user-date">
                                    {{ $laporan->created_at?->format('d/m/Y') ?? '-' }}
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
            </article>
        @empty
            <div class="laporan-empty">
                <p>Belum ada laporan sungai.</p>
            </div>
        @endforelse

    </div>

    <!-- {{-- ====== PAGINATION INFO ====== --}}
    <div class="laporan-pagination">
        <span class="pagination-info">
            Menampilkan {{ $laporansungais->firstItem() ?? 0 }}
            sampai {{ $laporansungais->lastItem() ?? 0 }}
            dari {{ $laporansungais->total() }} laporan warga
        </span>

        <div class="pagination-links">
            {{ $laporansungais->links() }}
        </div>
    </div> -->

</div>