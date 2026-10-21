<div class="laporan-page">

    {{-- ====== FILTER & SEARCH ====== --}}
    @include('map.partials.filter-laporan')

    <link rel="stylesheet" href="{{ asset('css/laporan-style.css') }}">

    {{-- ====== GRID KARTU LAPORAN ====== --}}
    <div class="laporan-grid">

        @forelse ($laporansungais as $laporan)
        <article class="laporan-card" wire:key="laporan-{{ $laporan->laporansungai_id }}">

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

                {{-- Badge Status --}}
                @php
                $statusKey = strtolower($laporan->status ?? '');
                $statusClass = match ($statusKey) {
                'bersih' => 'badge-bersih',
                'cukup bersih' => 'badge-cukup',
                'kurang bersih' => 'badge-kurang',
                'tercemar' => 'badge-tercemar',
                default => 'badge-default',
                };
                $dotClass = match ($statusKey) {
                'bersih' => 'dot-bersih',
                'cukup bersih' => 'dot-cukup',
                'kurang bersih' => 'dot-kurang',
                'tercemar' => 'dot-tercemar',
                default => 'dot-default',
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
                            {{ strtoupper(substr($laporan->user->username ?? 'U', 0, 1)) }}
                        </div>
                        <div class="user-info">
                            <span class="user-name">{{ $laporan->user->username ?? 'Anonim' }}</span>
                            <span class="user-date">
                                {{ $laporan->created_at?->diffForHumans() ?? '-' }}
                            </span>
                        </div>
                    </div>
                </div>

                {{-- Tombol Tindak Lanjut --}}
                <div class="mt-2 mb-3">
                    <a href="{{ route('tindak-lanjut.index', $laporan->laporansungai_id) }}"
                        class="btn btn-sm btn-outline-primary w-100"
                        style="font-size: 0.85rem; border-radius: 8px;">
                        Kelola Tindak Lanjut
                    </a>
                </div>

            </div>
        </article>
        @empty
        <div class="laporan-empty">
            <p>Belum ada laporan sungai.</p>
        </div>
        @endforelse

    </div>

</div>