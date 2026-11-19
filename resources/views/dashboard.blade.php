<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | CBT TKA SMPN 5 Langke Rembong</title>
    <style>
        *{box-sizing:border-box}body{margin:0;font-family:Arial,sans-serif;background:#f1f5f9;color:#17233d}
        header{background:#102b52;color:white;padding:18px 5%;display:flex;justify-content:space-between;align-items:center;gap:16px}
        header strong{font-size:17px}button{border:1px solid #ffffff66;background:transparent;color:#fff;padding:9px 14px;border-radius:8px;cursor:pointer}
        main{max-width:1050px;margin:42px auto;padding:0 22px}.welcome{background:white;border-radius:18px;padding:30px;box-shadow:0 8px 30px #0f172a0c}
        .eyebrow{color:#b08020;font-size:12px;font-weight:800;letter-spacing:1px;text-transform:uppercase}
        h1{margin:9px 0;color:#102b52}.muted{color:#64748b;line-height:1.6}
        .role{display:inline-block;background:#e8eef8;color:#173d70;border-radius:30px;padding:7px 13px;font-size:13px;font-weight:700;margin-top:12px}
        .notice{margin-top:22px;padding:16px;border-left:4px solid #d6a63b;background:#fffbeb;border-radius:8px;color:#785b18;font-size:14px;line-height:1.5}
    </style>
</head>
<body>
<header>
    <strong>CBT TKA · SMPN 5 Langke Rembong</strong>
    <form method="POST" action="/logout">@csrf<button type="submit">Keluar</button></form>
</header>
<main>
    <section class="welcome">
        <div class="eyebrow">Dashboard</div>
        <h1>Selamat datang, {{ auth()->user()->name }}.</h1>
        <p class="muted">Anda berhasil masuk ke aplikasi CBT TKA SMP Negeri 5 Langke Rembong.</p>
        <span class="role">Peran: {{ strtoupper(auth()->user()->role) }}</span>
        <div class="notice">Fondasi login sudah tersedia. Menu dan fitur khusus ADMIN, GURU, PENGAWAS, dan SISWA akan dibangun pada tahap berikutnya.</div>
    </section>
</main>
</body>
</html>
