<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Admin</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f8f9fa; color: #333; }
        .card { max-width: 450px; margin: 50px auto; background: white; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); overflow: hidden; }
        .card-header { background-color: #ffc107; color: #000; padding: 15px 20px; font-size: 18px; font-weight: bold; }
        .card-body { padding: 25px; }
        .mb-3 { margin-bottom: 20px; }
        .form-label { display: block; margin-bottom: 8px; font-weight: bold; font-size: 14px; }
        .form-control { width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; box-sizing: border-box; font-size: 14px; }
        .btn-container { display: flex; gap: 10px; margin-top: 25px; }
        .btn-primary { flex-grow: 1; background-color: #0d6efd; color: white; padding: 12px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold; font-size: 14px; }
        .btn-primary:hover { background-color: #0b5ed7; }
        .btn-secondary { background-color: #6c757d; color: white; padding: 12px 20px; text-decoration: none; text-align: center; border-radius: 5px; font-size: 14px; }
        .btn-secondary:hover { background-color: #5c636a; }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">Edit Data Admin</div>
        <div class="card-body">
            <form action="{{ route('admin.update', $admin->admin_id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama_admin" class="form-control" value="{{ $admin->nama_admin }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" value="{{ $admin->username }}" required>
                </div>
                <div class="btn-container">
                    <button type="submit" class="btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('admin.index') }}" class="btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>