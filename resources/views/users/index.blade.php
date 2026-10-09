<!-- Form Pencarian (Metode GET) -->
<form action="{{ route('users.index') }}" method="GET" style="margin-bottom: 20px;">
    <input type="text" name="search" placeholder="Cari nama lengkap..." value="{{ request('search') }}">
    <button type="submit">Cari</button>

    @if (request('search'))
        <a href="{{ route('users.index') }}">Reset</a>
    @endif
</form>

<!-- Tampilan Daftar Data dengan Tombol Aksi Hapus -->
@if ($users->isEmpty())
    <p>Data pengguna tidak ditemukan.</p>
@else
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Username</th>
                <th>Bio</th>
                <th>Pekerjaan</th>
                <th>Domisili</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->nama_lengkap }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->bio }}</td>
                    <td>{{ $user->pekerjaan }}</td>
                    <td>{{ $user->domisili }}</td>
                    <td>
                        <!-- Form Hapus Khusus untuk Item Pengguna Ini -->
                        <form action="{{ route('users.destroy', $user->getKey()) }}" method="POST"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus {{ $user->nama_lengkap }}?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
