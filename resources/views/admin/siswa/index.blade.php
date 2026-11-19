<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Siswa | CBT TKA SMPN 5 Langke Rembong</title>
    <style>
        body{font-family:Arial,sans-serif;background:#f3f6fc;color:#1e293b;margin:0;padding:30px}
        .container{max-width:1150px;margin:auto}
        .header{display:flex;justify-content:space-between;align-items:center;gap:15px;flex-wrap:wrap;margin-bottom:25px}
        h1{margin:0 0 8px;font-size:25px}
        .muted{color:#64748b;font-size:14px}
        .card{background:white;padding:22px;border-radius:12px;box-shadow:0 3px 15px #0f172a0d}
        .btn{display:inline-block;padding:10px 15px;border-radius:7px;text-decoration:none;border:0;cursor:pointer;font-size:14px}
        .primary{background:#1d4ed8;color:white}
        .edit{background:#e0edff;color:#1d4ed8}
        .delete{background:#fee2e2;color:#b91c1c}
        table{width:100%;border-collapse:collapse;margin-top:15px;font-size:14px}
        th,td{padding:13px 10px;border-bottom:1px solid #e2e8f0;text-align:left}
        th{background:#f8fafc;color:#475569}
        .alert{padding:12px;background:#dcfce7;color:#166534;border-radius:7px;margin-bottom:15px}
        .filters{display:flex;gap:9px;flex-wrap:wrap;margin:17px 0}
        .filters input,.filters select{padding:10px 12px;border:1px solid #cbd5e1;border-radius:7px;font-size:14px;min-width:180px}
        .filters button{padding:10px 15px;border:0;border-radius:7px;background:#1d4ed8;color:white;cursor:pointer}
        .filters a{padding:10px 13px;border-radius:7px;background:#e2e8f0;color:#334155;text-decoration:none;font-size:14px}
        .status{display:inline-block;padding:5px 9px;border-radius:20px;font-size:12px;font-weight:bold}
        .active-status{background:#dcfce7;color:#166534}
        .inactive-status{background:#fee2e2;color:#991b1b}
        .actions{display:flex;gap:7px;align-items:center}
        .actions form{margin:0}
        @media(max-width:700px){body{padding:12px}.card{overflow-x:auto}table{min-width:750px}}
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <div>
            <h1>Data Siswa</h1>
            <div class="muted">CBT TKA SMP Negeri 5 Langke Rembong</div>
        </div>
        <a href="{{ route('admin.siswa.create') }}" class="btn primary">+ Tambah Siswa</a>
    </div>

    <div class="card">
        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        <div class="muted">Daftar peserta didik yang terdaftar dalam sistem.</div>

        <form class="filters" method="GET" action="{{ route('admin.siswa.index') }}">
            <input type="search" name="q" value="{{ $search }}" placeholder="Cari NISN, NIS, atau nama siswa...">
            <select name="status">
                <option value="">Semua Status</option>
                <option value="aktif" @selected($status === 'aktif')>Aktif</option>
                <option value="nonaktif" @selected($status === 'nonaktif')>Nonaktif</option>
            </select>
            <button type="submit">Cari</button>
            <a href="{{ route('admin.siswa.index') }}">Reset</a>
        </form>

        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>NISN</th>
                    <th>NIS</th>
                    <th>Nama Lengkap</th>
                    <th>L/P</th>
                    <th>Kelas</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($siswas as $siswa)
                    <tr>
                        <td>{{ $siswas->firstItem() + $loop->index }}</td>
                        <td>{{ $siswa->nisn }}</td>
                        <td>{{ $siswa->nis }}</td>
                        <td>{{ $siswa->nama_lengkap }}</td>
                        <td>{{ $siswa->jenis_kelamin }}</td>
                        <td>-</td>
                        <td><span class="status {{ $siswa->status === 'aktif' ? 'active-status' : 'inactive-status' }}">{{ ucfirst($siswa->status) }}</span></td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('admin.siswa.show', $siswa->id) }}" class="btn edit">Detail</a>
                                <a href="{{ route('admin.siswa.edit', $siswa->id) }}" class="btn edit">Edit</a>
                                <form action="{{ route('admin.siswa.destroy', $siswa->id) }}" method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus data siswa ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn delete">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" style="text-align:center;padding:30px;color:#64748b">
                            Belum ada data siswa. Silakan tambahkan data siswa.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div style="margin-top:20px">
            {{ $siswas->links() }}
        </div>
    </div>
</div>
</body>
</html>
