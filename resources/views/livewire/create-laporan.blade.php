<div>
    <div class="container py-5 d-flex justify-content-center">
        <div class="w-100 bg-white" style="max-width: 650px; padding: 40px 20px;">

            <h3 class="fw-bold mb-5" style="color: #00685F;">Form Laporan Sungai</h3>

            <form wire:submit.prevent="store">
                @csrf

                <div class="mb-4 pb-2">
                    <input type="text" class="form-control border-0 border-bottom rounded-0 shadow-none px-0"
                        name="nama_sungai" placeholder="Nama Sungai"
                        style="color: #6b7280; border-bottom: 1.5px solid #9ca3af !important; font-size: 15px; background-color: transparent;"
                        readonly value="{{ $sungai->nama_sungai ?? '' }}">
                </div>

                <div class="mb-4 pb-2">
                    <input type="text" class="form-control border-0 border-bottom rounded-0 shadow-none px-0"
                        name="alamat" placeholder="Alamat"
                        style="color: #6b7280; border-bottom: 1.5px solid #9ca3af !important; font-size: 15px; background-color: transparent;"
                        readonly value="{{ $sungai->alamat ?? '' }}">
                </div>

                <div class="mb-4 pb-2">
                    <select class="form-select border-0 border-bottom rounded-0 shadow-none px-0" name="status"
                        style="color: #6b7280; border-bottom: 1.5px solid #9ca3af !important; font-size: 15px; background-color: transparent;"
                        required wire:model="status">
                        <option value="" disabled selected hidden>Status</option>
                        <option value="Bersih">Bersih</option>
                        <option value="Cukup Bersih">Cukup Bersih</option>
                        <option value="Kurang Bersih">Kurang Bersih</option>
                        <option value="Tercemar">Tercemar</option>
                    </select>
                </div>

                <button type="submit" class="btn w-100 fw-bold border-0"
                    style="background-color: #00685F; color: white; padding: 14px; font-size: 15px; border-radius: 8px; transition: opacity 0.2s;"
                    onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
                    SUBMIT
                </button>

            </form>

        </div>
    </div>
</div>
