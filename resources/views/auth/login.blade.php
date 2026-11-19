<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk | CBT TKA SMPN 5 Langke Rembong</title>
    <style>
        *{box-sizing:border-box}body{margin:0;min-height:100vh;font-family:Arial,sans-serif;background:linear-gradient(135deg,#0b1f45,#173d70);display:grid;place-items:center;padding:24px;color:#17233d}
        .card{width:100%;max-width:430px;background:#fff;border-radius:20px;padding:34px;box-shadow:0 24px 70px #06152c66}
        .brand{width:54px;height:54px;border-radius:15px;background:#e8b84b;color:#10264a;display:grid;place-items:center;font-weight:800;font-size:20px;margin-bottom:20px}
        h1{font-size:24px;margin:0 0 8px;color:#10264a}.sub{color:#64748b;margin:0 0 26px;line-height:1.5}
        label{display:block;font-size:13px;font-weight:700;margin:16px 0 7px}input{width:100%;padding:13px 14px;border:1px solid #cbd5e1;border-radius:10px;font-size:15px;outline:none}input:focus{border-color:#2563eb;box-shadow:0 0 0 3px #2563eb1c}
        .remember{display:flex;align-items:center;gap:8px;font-size:13px;color:#475569;margin:16px 0}.remember input{width:auto}
        button{width:100%;border:0;border-radius:10px;background:#173d70;color:#fff;padding:14px;font-size:15px;font-weight:700;cursor:pointer}button:hover{background:#0b2c59}
        .error{background:#fff1f2;color:#be123c;border:1px solid #fecdd3;border-radius:9px;padding:11px 13px;font-size:13px;margin:15px 0}
        footer{text-align:center;color:#94a3b8;font-size:12px;margin-top:24px}
    </style>
</head>
<body>
    <main class="card">
        <div class="brand">CBT</div>
        <h1>CBT TKA</h1>
        <p class="sub">SMP Negeri 5 Langke Rembong<br>Silakan masuk menggunakan akun Anda.</p>
        @if ($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif
        <form method="POST" action="/login">
            @csrf
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
            <label for="password">Kata sandi</label>
            <input id="password" type="password" name="password" required autocomplete="current-password">
            <label class="remember"><input type="checkbox" name="remember" value="1"> Ingat saya</label>
            <button type="submit">Masuk ke Aplikasi</button>
        </form>
        <footer>© {{ date('Y') }} SMP Negeri 5 Langke Rembong</footer>
    </main>
</body>
</html>
