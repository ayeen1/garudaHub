<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Proyek') - Garuda-Hub</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<header>
    <div class="in">
        <a class="brand" href="{{ route('projects.index') }}">Garuda-Hub</a>
            <nav aria-label="Navigasi utama">
                <a href="{{ route('projects.index') }}">Proyek</a>
                @auth
                    @if (auth()->user()->role === 'client')
                    <a href="{{ route('projects.create') }}">Pasang Proyek</a>
                    @endif
                    <span>{{ auth()->user()->name }} ({{ auth()->user()->role }})</span>
                    <form class="inline" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="sm sec" type="submit">Keluar</button>
                    </form>

                @endauth

                @guest
                    <a href="{{ route('login') }}">Masuk</a>
                    <a href="{{ route('register') }}">Daftar</a>
                @endguest

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
