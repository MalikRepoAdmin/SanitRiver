<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Admin</title>
    <!-- MENGGUNAKAN CSS INTERNAL AGAR JALAN SECARA OFFLINE TANPA INTERNET -->
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f8f9fa; color: #333; }
        .header-container { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        .btn-primary { background-color: #0d6efd; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; font-weight: bold; }
        .btn-primary:hover { background-color: #0b5ed7; }
        .search-form { display: flex; gap: 10px; margin-bottom: 25px; }
        .form-control { flex-grow: 1; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; }
        .btn-secondary { background-color: #6c757d; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 14px; }
        .btn-secondary:hover { background-color: #5c636a; }
        table { width: 100%; border-collapse: collapse; background-color: white; border-radius: 5px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.05); }
        th, td { border: 1px solid #dee2e6; padding: 12px; text-align: left; }
        th { background-color: #212529; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        .action-flex { display: flex; gap: 8px; }
        .btn-warning { background-color: #ffc107; color: #000; padding: 5px 12px; text-decoration: none; border-radius: 4px; font-size: 13px; font-weight: bold; }
        .btn-danger { background-color: #dc3545; color: white; padding: 5px 12px; border: none; border-radius: 4px; cursor: pointer; font-size: 13px; font-weight: bold; }
        form { margin: 0; }
    </style>
</head>
<body>
    <div class="header-container">
        <h2>Daftar Admin SanitRiver</h2>
        <a href="{{ route('admin.create') }}" class="btn-primary">Tambah Admin Baru</a>
    </div>

    <!-- Form Pencarian Sesuai Langkah A Modul -->
    <form action="{{ route('admin.index') }}" method="GET" class="search-form">
        <input type="text" name="search" class="form-control" placeholder="Cari nama admin..." value="{{ request('search') }}">
        <button type="submit" class="btn-secondary">Cari</button>
    </form>

    <!-- Tabel Data -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Admin</th>
                <th>Username</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($admins as $admin)
                <tr>
                    <td>{{ $admin->admin_id }}</td>
                    <td>{{ $admin->nama_admin }}</td>
                    <td>{{ $admin->username }}</td>
                    <td>
                        <div class="action-flex">
                            <a href="{{ route('admin.edit', $admin->admin_id) }}" class="btn-warning">Edit</a>
                            
                            <!-- Form Delete Terpisah Sesuai Langkah D Modul -->
                            <form action="{{ route('admin.destroy', $admin->admin_id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" style="text-align: center; color: #6c757d;">Data tidak ditemukan.</td></tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>