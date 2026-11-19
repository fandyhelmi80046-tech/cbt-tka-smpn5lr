<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | CBT TKA SMPN 5 Langke Rembong</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f6fb;
            color: #172b4d;
        }
        .layout { display: flex; min-height: 100vh; }
        .sidebar {
            width: 255px;
            background: #102b50;
            color: white;
            padding: 24px 16px;
            flex-shrink: 0;
        }
        .brand {
            padding: 4px 10px 26px;
            border-bottom: 1px solid #345071;
        }
        .brand-mark {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 43px;
            height: 43px;
            border-radius: 12px;
            background: #e9b847;
            color: #102b50;
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 12px;
        }
        .brand h2 { font-size: 17px; margin: 0 0 7px; }
        .brand p { color: #b9c8dc; font-size: 12px; margin: 0; }
        .nav-title {
            color: #9fb2ca;
            font-size: 10px;
            font-weight: bold;
            letter-spacing: 1.3px;
            margin: 26px 10px 10px;
        }
        .nav-link {
            display: block;
            padding: 12px 13px;
            margin: 4px 0;
            border-radius: 8px;
            color: #dce6f3;
            text-decoration: none;
            font-size: 13px;
        }
        .nav-link.active {
            background: #244a78;
            color: white;
            font-weight: bold;
        }
        .nav-link:hover { background: #1d416d; }
        .main { flex: 1; min-width: 0; }
        .topbar {
            height: 72px;
            background: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 32px;
            border-bottom: 1px solid #e5eaf1;
        }
        .topbar strong { font-size: 15px; }
        .user-area { display: flex; align-items: center; gap: 13px; }
        .avatar {
            width: 37px;
            height: 37px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #e8effa;
            color: #173d6b;
            font-weight: bold;
        }
        .user-name { font-size: 12px; font-weight: bold; }
        .user-role { font-size: 11px; color: #77869b; margin-top: 4px; }
        .logout {
            border: 1px solid #d7dfeb;
            background: white;
            color: #24466e;
            padding: 9px 14px;
            border-radius: 7px;
            cursor: pointer;
        }
        .content { padding: 30px 32px; max-width: 1500px; margin: auto; }
        .eyebrow {
            color: #bd8b23;
            font-weight: bold;
            font-size: 11px;
            letter-spacing: 1.5px;
        }
        h1 { font-size: 26px; margin: 10px 0 8px; }
        .subtitle { color: #718096; font-size: 14px; margin-bottom: 26px; }
        .cards {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 17px;
            margin-bottom: 25px;
        }
        .stat-card, .panel {
            background: white;
            border: 1px solid #e8edf4;
            border-radius: 13px;
            padding: 21px;
            box-shadow: 0 4px 15px rgba(25, 48, 80, .035);
        }
        .stat-label { color: #718096; font-size: 12px; }
        .stat-value { font-size: 27px; font-weight: bold; margin: 12px 0 5px; }
        .stat-note { color: #9aa6b6; font-size: 11px; }
        .panel-grid {
            display: grid;
            grid-template-columns: 1.4fr 1fr;
            gap: 18px;
        }
        .panel h3 { font-size: 16px; margin: 0 0 7px; }
        .panel-desc { color: #8794a6; font-size: 12px; margin-bottom: 20px; }
        .empty {
            background: #f7f9fc;
            border: 1px dashed #d8e0eb;
            border-radius: 9px;
            padding: 28px 15px;
            text-align: center;
            color: #8190a4;
            font-size: 13px;
        }
        .quick-link {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 13px 0;
            border-bottom: 1px solid #edf0f5;
            color: #29496f;
            font-size: 13px;
        }
        .quick-link:last-child { border-bottom: 0; }
        .coming { color: #a0aaba; font-size: 10px; }
        .footer {
            color: #98a4b4;
            font-size: 11px;
            text-align: center;
            padding: 28px 10px;
        }
        @media (max-width: 950px) {
            .cards { grid-template-columns: repeat(2, 1fr); }
            .panel-grid { grid-template-columns: 1fr; }
        }
        @media (max-width: 650px) {
            .layout { display: block; }
            .sidebar { width: 100%; padding: 15px; }
            .brand { padding-bottom: 12px; }
            .nav-title { margin-top: 14px; }
            .topbar { padding: 0 15px; }
            .content { padding: 23px 15px; }
            .cards { gap: 10px; }
            .stat-card { padding: 15px; }
            h1 { font-size: 21px; }
        }
    </style>
</head>
<body>
<div class="layout">
    <aside class="sidebar">
        <div class="brand">
            <div class="brand-mark">CBT</div>
            <h2>CBT TKA SMPN 5</h2>
            <p>Langke Rembong</p>
        </div>

        <div class="nav-title">MENU UTAMA</div>
        <a class="nav-link active" href="{{ route('dashboard') }}">▦ &nbsp; Dashboard</a>

        <div class="nav-title">MANAJEMEN DATA</div>
        <a class="nav-link" href="{{ route('admin.siswa.index') }}">♙ &nbsp; Data Siswa</a>
        <a class="nav-link" href="#data-guru">♙ &nbsp; Data Guru</a>
        <a class="nav-link" href="#data-pengawas">♙ &nbsp; Data Pengawas</a>
        <a class="nav-link" href="#data-kelas">▤ &nbsp; Data Kelas</a>
        <a class="nav-link" href="#mata-pelajaran">▧ &nbsp; Mata Pelajaran</a>

        <div class="nav-title">UJIAN</div>
        <a class="nav-link" href="#ruang-ujian">▣ &nbsp; Ruang Ujian</a>
        <a class="nav-link" href="#jadwal-ujian">◷ &nbsp; Jadwal Ujian</a>
        <a class="nav-link" href="#monitoring">◉ &nbsp; Monitoring Live</a>
        <a class="nav-link" href="#hasil-ujian">▥ &nbsp; Hasil Ujian</a>

        <div class="nav-title">SISTEM</div>
        <a class="nav-link" href="#audit-log">▤ &nbsp; Audit Log</a>
        <a class="nav-link" href="#pengaturan">⚙ &nbsp; Pengaturan</a>
    </aside>

    <div class="main">
        <header class="topbar">
            <strong>Panel Administrator</strong>
            <div class="user-area">
                <div class="avatar">
                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                </div>
                <div>
                    <div class="user-name">{{ auth()->user()->name }}</div>
                    <div class="user-role">{{ strtoupper(auth()->user()->role) }}</div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="logout" type="submit">Keluar</button>
                </form>
            </div>
        </header>

        <main class="content">
            <div class="eyebrow">ADMINISTRATOR / DASHBOARD</div>
            <h1>Selamat datang, {{ auth()->user()->name }}!</h1>
            <p class="subtitle">
                Pusat kendali sistem Computer Based Test TKA SMP Negeri 5 Langke Rembong.
            </p>

            <section class="cards">
                <div class="stat-card">
                    <div class="stat-label">Total Siswa</div>
                    <div class="stat-value">{{ $totalSiswa }}</div>
                    <div class="stat-note">Data peserta terdaftar</div>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Total Guru</div>
                    <div class="stat-value">0</div>
                    <div class="stat-note">Guru pengelola soal</div>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Jadwal Ujian</div>
                    <div class="stat-value">0</div>
                    <div class="stat-note">Jadwal yang tersedia</div>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Ujian Berlangsung</div>
                    <div class="stat-value">0</div>
                    <div class="stat-note">Sesi ujian aktif</div>
                </div>
            </section>

            <section class="panel-grid">
                <div class="panel">
                    <h3>Aktivitas Ujian</h3>
                    <div class="panel-desc">Ringkasan aktivitas pelaksanaan ujian.</div>
                    <div class="empty">
                        Belum ada aktivitas ujian.<br>
                        Aktivitas akan ditampilkan setelah jadwal dan sesi ujian dibuat.
                    </div>
                </div>

                <div class="panel">
                    <h3>Akses Cepat</h3>
                    <div class="panel-desc">Menu pengelolaan sistem administrator.</div>
                    <a class="quick-link" href="{{ route('admin.siswa.index') }}" style="text-decoration:none"><span>Kelola Data Siswa</span><span>BUKA →</span></a>
                    <div class="quick-link"><span>Kelola Data Guru</span><span class="coming">SEGERA</span></div>
                    <div class="quick-link"><span>Buat Jadwal Ujian</span><span class="coming">SEGERA</span></div>
                    <div class="quick-link"><span>Monitoring Ujian</span><span class="coming">SEGERA</span></div>
                    <div class="quick-link"><span>Lihat Hasil Ujian</span><span class="coming">SEGERA</span></div>
                </div>
            </section>

            <div class="footer">
                © {{ date('Y') }} CBT TKA SMP Negeri 5 Langke Rembong
                · Sistem Ujian Berbasis Komputer
            </div>
        </main>
    </div>
</div>
</body>
</html>
