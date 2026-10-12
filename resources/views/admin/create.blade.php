<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Admin</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f8f9fa; color: #333; }
        .card { max-width: 450px; margin: 50px auto; background: white; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); overflow: hidden; }
        .card-header { background-color: #198754; color: white; padding: 15px 20px; font-size: 18px; font-weight: bold; }
        .card-body { padding: 25px; }
        .mb-3 { margin-bottom: 20px; }
        .form-label { display: block; margin-bottom: 8px; font-weight: bold; font-size: 14px; }
        .form-control { width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; box-sizing: border-box; font-size: 14px; }
        .btn-container { display: flex; gap: 10px; margin-top: 25px; }
        .btn-success { flex-grow: 1; background-color: #198754; color: white; padding: 12px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold; font-size: 14px; }
        .btn-success:hover { background-color: #157347; }
        .btn-secondary { background-color: #6c757d; color: white; padding: 12px 20px; text-decoration: none; text-align: center; border-radius: 5px; font-size: 14px; }
        .btn-secondary:hover { background-color: #5c636a; }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">Tambah Admin Baru</div>
        <div class="card-body">
            <form action="{{ route('admin.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama_admin" class="form-control" required placeholder="Ketik nama lengkap...">
                </div>
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" required placeholder="Ketik username...">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required placeholder="Minimal 6 karakter...">
                </div>
                <div class="btn-container">
                    <button type="submit" class="btn-success">Simpan Data</button>
                    <a href="{{ route('admin.index') }}" class="btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>