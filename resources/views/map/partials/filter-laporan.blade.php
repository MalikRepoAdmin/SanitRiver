<div class="filter-bar">
    {{-- Filter untuk halaman LAPORAN SUNGAI (Livewire) --}}

    <link rel="stylesheet" href="{{ asset('css/map-style.css') }}">

    {{-- Search --}}
    <div class="filter-search">
        <svg class="icon-search" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
        <input type="text"
               placeholder="Cari nama atau lokasi sungai..."
               wire:model.live.debounce.400ms="search">
    </div>

    <!-- {{-- Wilayah --}}
    <div class="filter-item">
        <select wire:model.live="wilayah">
            <option value="dki">DKI Jakarta</option>
            <option value="bogor">Bogor</option>
            <option value="depok">Depok</option>
            <option value="tangerang">Tangerang</option>
            <option value="bekasi">Bekasi</option>
        </select>
    </div>

    {{-- Urutan --}}
    <div class="filter-item">
        <select wire:model.live="urutan">
            <option value="terbaru">Laporan terbaru</option>
            <option value="terlama">Laporan terlama</option>
            <option value="populer">Paling populer</option>
        </select>
    </div>

    {{-- Status --}}
    <div class="filter-status">
        <span class="status-label">Status:</span>

        <button type="button"
                class="status-btn {{ $status === 'semua' ? 'active' : '' }}"
                wire:click="$set('status', 'semua')">
            Semua
        </button>

        <button type="button"
                class="status-btn {{ $status === 'bersih' ? 'active' : '' }}"
                wire:click="$set('status', 'bersih')">
            <span class="dot dot-bersih"></span> Bersih
        </button>

        <button type="button"
                class="status-btn {{ $status === 'cukup' ? 'active' : '' }}"
                wire:click="$set('status', 'cukup')">
            <span class="dot dot-cukup"></span> Cukup Bersih
        </button>

        <button type="button"
                class="status-btn {{ $status === 'tercemar' ? 'active' : '' }}"
                wire:click="$set('status', 'tercemar')">
            <span class="dot dot-tercemar"></span> Tercemar
        </button>
    </div> -->

</div>