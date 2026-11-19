<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Detail Siswa | CBT TKA SMPN 5</title>
<style>
*{box-sizing:border-box}body{margin:0;padding:28px;background:#f3f6fc;color:#1e293b;font-family:Arial,sans-serif}.wrap{max-width:800px;margin:auto}.card{background:#fff;padding:26px;border-radius:13px;box-shadow:0 4px 18px #0f172a0c}h1{margin:0 0 7px;font-size:24px}.muted{color:#64748b;font-size:13px;margin-bottom:22px}.row{display:grid;grid-template-columns:190px 1fr;padding:13px 0;border-bottom:1px solid #e2e8f0;font-size:14px}.key{color:#64748b}.btn{display:inline-block;margin-top:20px;padding:11px 16px;border-radius:7px;text-decoration:none;background:#1d4ed8;color:#fff;font-size:14px}.back{background:#e2e8f0;color:#334155}@media(max-width:550px){body{padding:14px}.row{grid-template-columns:120px 1fr}}
</style></head>
<body><div class="wrap"><div class="card">
<h1>Detail Data Siswa</h1><div class="muted">CBT TKA SMP Negeri 5 Langke Rembong</div>
<div class="row"><div class="key">NISN</div><strong>{{ $siswa->nisn }}</strong></div>
<div class="row"><div class="key">NIS</div><div>{{ $siswa->nis ?: '-' }}</div></div>
<div class="row"><div class="key">Nama Lengkap</div><strong>{{ $siswa->nama_lengkap }}</strong></div>
<div class="row"><div class="key">Jenis Kelamin</div><div>{{ $siswa->jenis_kelamin==='L'?'Laki-laki':'Perempuan' }}</div></div>
<div class="row"><div class="key">Tempat Lahir</div><div>{{ $siswa->tempat_lahir ?: '-' }}</div></div>
<div class="row"><div class="key">Tanggal Lahir</div><div>{{ $siswa->tanggal_lahir?->format('d-m-Y') ?: '-' }}</div></div>
<div class="row"><div class="key">Alamat</div><div>{{ $siswa->alamat ?: '-' }}</div></div>
<div class="row"><div class="key">Status</div><div>{{ ucfirst($siswa->status) }}</div></div>
<a class="btn" href="{{ route('admin.siswa.edit',$siswa) }}">Edit Data</a>
<a class="btn back" href="{{ route('admin.siswa.index') }}">Kembali ke Daftar</a>
</div></div></body></html>