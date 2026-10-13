<div>
    <div class="container py-5 d-flex justify-content-center">
        <div class="w-100 bg-white" style="max-width: 650px; padding: 40px 20px;">
            
            <h3 class="fw-bold mb-5" style="color: #00685F;">Form Laporan Sungai</h3>

            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-4 pb-2">
                    <input type="text" class="form-control border-0 border-bottom rounded-0 shadow-none px-0" name="nama_sungai" placeholder="Nama Sungai" style="color: #6b7280; border-bottom: 1.5px solid #9ca3af !important; font-size: 15px; background-color: transparent;" required>
                </div>

                <div class="mb-4 pb-2">
                    <input type="text" class="form-control border-0 border-bottom rounded-0 shadow-none px-0" name="alamat" placeholder="Alamat" style="color: #6b7280; border-bottom: 1.5px solid #9ca3af !important; font-size: 15px; background-color: transparent;" required>
                </div>

                <div class="mb-4 pb-2">
                    <select class="form-select border-0 border-bottom rounded-0 shadow-none px-0" name="status" style="color: #6b7280; border-bottom: 1.5px solid #9ca3af !important; font-size: 15px; background-color: transparent;" required>
                        <option value="" disabled selected hidden>Status</option>
                        <option value="Bersih">Bersih</option>
                        <option value="Cukup Bersih">Cukup Bersih</option>
                        <option value="Kurang Bersih">Kurang Bersih</option>
                        <option value="Tercemar">Tercemar</option>
                    </select>
                </div>

                <div class="mb-5">
                    <div class="position-relative w-100" style="height: 220px; border: 1.5px dashed #9ca3af; overflow: hidden; display: flex; align-items: center; justify-content: center; cursor: pointer; background-color: #f9fafb;">
                        <input type="file" name="foto_sungai" class="position-absolute w-100 h-100" style="opacity: 0; cursor: pointer; z-index: 2;" accept="image/*">
                        <img src="{{ asset('images/beranda-sungai.jpg') }}" alt="Preview" class="position-absolute w-100 h-100" style="object-fit: cover; z-index: 1;">
                    </div>
                </div>

                <button type="submit" class="btn w-100 fw-bold border-0" style="background-color: #00685F; color: white; padding: 14px; font-size: 15px; border-radius: 8px; transition: opacity 0.2s;" onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
                    SUBMIT
                </button>
                
            </form>

        </div>
    </div>
</div>