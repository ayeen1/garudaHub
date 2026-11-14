<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Proyek') - Garuda-Hub</title>
    <style>
        {box-sizing:border-box}body{margin:0;font-family:system-ui,Segoe UI,Arial,sans-serif;background:#f4f6f8;color:#1f2933;line-height:1.5}
        a{color:#0b5cad;text-decoration:none}a:hover{text-decoration:underline}
        header{background:#7a1020;color:#fff}header .in{max-width:1000px;margin:auto;padding:12px 16px;display:flex;flex-wrap:wrap;align-items:center;gap:14px}
        header a{color:#fff}header .brand{font-weight:700;font-size:1.3rem;margin-right:auto}
        main{max-width:1000px;margin:20px auto;padding:0 16px}
        .card{background:#fff;border-radius:8px;padding:18px;margin-bottom:16px;box-shadow:0 1px 3px rgba(0,0,0,.1)}
        h1{font-size:1.5rem;margin:0 0 14px}h2{font-size:1.15rem;margin:0 0 10px}
        label{display:block;margin:10px 0 4px;font-weight:600}
        input,select,textarea{width:100%;padding:8px;border:1px solid #c5ccd3;border-radius:6px;font:inherit}
        textarea{min-height:110px}
        .btn,button{display:inline-block;background:#7a1020;color:#fff;border:0;border-radius:6px;padding:8px 16px;font:inherit;cursor:pointer}
        .btn.sec,button.sec{background:#52606d}.btn.danger,button.danger{background:#b42318}.btn.sm,button.sm{padding:3px 10px;font-size:.85rem}
        .btn:hover{text-decoration:none;opacity:.9}
        table{width:100%;border-collapse:collapse}th,td{text-align:left;padding:8px;border-bottom:1px solid #e4e7eb;vertical-align:top}th{background:#f0f2f5}
        .badge{padding:2px 9px;border-radius:12px;font-size:.8rem;color:#fff}.badge.open{background:#1a7f37}.badge.closed{background:#6b7280}.badge.win{background:#b7791f}
        .flash{padding:10px 14px;border-radius:6px;margin-bottom:14px}.flash.ok{background:#d9f2e0}.flash.err{background:#fde2e0}
        .muted{color:#6b7280;font-size:.9rem}.row{display:flex;gap:10px;flex-wrap:wrap}.row>*{flex:1;min-width:140px}
        form.inline{display:inline}form.inline select{width:auto;padding:3px}
        .winner{background:#fff8e1}.search{display:flex;gap:8px}.search input{flex:1}.search button{flex:none}
        footer{text-align:center;color:#6b7280;font-size:.85rem;margin:30px 0}
        .sr-only{position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0,0,0,0);border:0}
        nav{display:flex;flex-wrap:wrap;align-items:center;gap:14px}
    </style>
</head>
<body>
<header>
    <div class="in">
        <a class="brand" href="{{ route('projects.index') }}">Garuda-Hub</a>
        <nav aria-label="Navigasi utama">
            <a href="{{ route('projects.index') }}">Proyek</a>
        </nav>
    </div>
</header>

<main>
    @if (session('ok'))
        <p class="flash ok" role="status">{{ session('ok') }}</p>
    @endif
    @if (session('err'))
        <p class="flash err" role="alert">{{ session('err') }}</p>
    @endif

    @yield('content')
</main>

<footer>
    <p>Garuda-Hub - aplikasi pembelajaran. Hanya data dummy.</p>
</footer>
</body>
</html>
