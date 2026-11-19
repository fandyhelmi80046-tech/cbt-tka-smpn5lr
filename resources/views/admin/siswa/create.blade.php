<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Tambah Siswa | CBT TKA SMPN 5</title>
<style>
*{box-sizing:border-box}body{margin:0;padding:28px;background:#f3f6fc;color:#1e293b;font-family:Arial,sans-serif}.wrap{max-width:850px;margin:auto}.top{display:flex;justify-content:space-between;align-items:center;gap:12px;margin-bottom:20px}h1{font-size:24px;margin:0 0 7px}.muted{color:#64748b;font-size:13px}.card{background:#fff;padding:25px;border-radius:13px;box-shadow:0 4px 18px #0f172a0c}.grid{display:grid;grid-template-columns:1fr 1fr;gap:17px}.field{margin-bottom:16px}label{display:block;font-size:13px;font-weight:bold;margin-bottom:7px}input,select,textarea{width:100%;padding:11px 12px;border:1px solid #cbd5e1;border-radius:7px;font:14px Arial}textarea{min-height:90px;resize:vertical}.btn{display:inline-block;padding:11px 16px;border:0;border-radius:7px;text-decoration:none;cursor:pointer;font-size:14px}.primary{background:#1d4ed8;color:#fff}.secondary{background:#e2e8f0;color:#334155}.error{color:#b91c1c;font-size:12px;margin-top:5px}.alert{background:#fee2e2;color:#991b1b;padding:12px;border-radius:7px;margin-bottom:15px}@media(max-width:620px){body{padding:14px}.grid{grid-template-columns:1fr}.card{padding:17px}}
</style></head>
<body><div class="wrap">
<div class="top"><div><h1>Tambah Data Siswa</h1><div class="muted">CBT TKA SMP Negeri 5 Langke Rembong</div></div><a class="btn secondary" href="{{ route('admin.siswa.index') }}">Kembali</a></div>
<div class="card">
@if($errors->any())<div class="alert"><strong>Periksa kembali isian:</strong><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
<form method="POST" action="{{ route('admin.siswa.store') }}">@csrf
<div class="grid">
<div class="field"><label for="nisn">NISN *</label><input id="nisn" name="nisn" value="{{ old('nisn') }}" required maxlength="20">@error('nisn')<div class="error">{{ $message }}</div>@enderror</div>
<div class="field"><label for="nis">NIS</label><input id="nis" name="nis" value="{{ old('nis') }}" maxlength="30">@error('nis')<div class="error">{{ $message }}</div>@enderror</div>
<div class="field"><label for="nama_lengkap">Nama Lengkap *</label><input id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required maxlength="150">@error('nama_lengkap')<div class="error">{{ $message }}</div>@enderror</div>
<div class="field"><label for="jenis_kelamin">Jenis Kelamin *</label><select id="jenis_kelamin" name="jenis_kelamin" required><option value="">Pilih</option><option value="L" @selected(old('jenis_kelamin')==='L')>Laki-laki</option><option value="P" @selected(old('jenis_kelamin')==='P')>Perempuan</option></select>@error('jenis_kelamin')<div class="error">{{ $message }}</div>@enderror</div>
<div class="field"><label for="tempat_lahir">Tempat Lahir</label><input id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" maxlength="100"></div>
<div class="field"><label for="tanggal_lahir">Tanggal Lahir</label><input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"></div>
<div class="field"><label for="status">Status *</label><select id="status" name="status" required><option value="aktif" @selected(old('status','aktif')==='aktif')>Aktif</option><option value="nonaktif" @selected(old('status')==='nonaktif')>Nonaktif</option></select></div>
</div>
<div class="field"><label for="alamat">Alamat</label><textarea id="alamat" name="alamat">{{ old('alamat') }}</textarea></div>
<button class="btn primary" type="submit">Simpan Data Siswa</button>
<a class="btn secondary" href="{{ route('admin.siswa.index') }}">Batal</a>
</form></div></div></body></html>