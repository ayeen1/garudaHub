@extends('layouts.app')

@section('title', 'Daftar Proyek')

@section('content')
<section class="card" aria-labelledby="judul-halaman">
    <h1 id="judul-halaman">Daftar Proyek</h1>

    <form class="search" method="GET" action="{{ route('projects.index') }}" role="search">
        <label for="q" class="sr-only">Cari proyek</label>
        <input type="search" id="q" name="q" maxlength="100"
               placeholder="Cari judul atau kategori..." value="{{ $cari }}">
        <button type="submit">Cari</button>
    </form>

    @if ($cari !== '')
        <p class="muted">Hasil pencarian untuk: <strong>{{ $cari }}</strong> ({{ $projects->count() }} proyek)</p>
    @endif
</section>

@forelse ($projects as $p)
    <article class="card">
        <h2>
            <a href="{{ route('projects.show', $p) }}">{{ $p->title }}</a>
            <span class="badge {{ $p->isOpen() ? 'open' : 'closed' }}">{{ $p->statusLabel() }}</span>
        </h2>
        <p class="muted">
            Kategori: {{ $p->category->name }} |
            Klien: {{ $p->client->name }} |
            Budget: Rp {{ number_format($p->budget_min, 0, ',', '.') }} - Rp {{ number_format($p->budget_max, 0, ',', '.') }} |
            Batas: <time datetime="{{ $p->deadline->format('Y-m-d') }}">{{ $p->deadline->format('d-m-Y') }}</time> |
            {{ $p->bids_count }} penawaran
        </p>
        <p>{{ Str::limit($p->description, 160) }}</p>
    </article>
@empty
    <section class="card">
        <p>Belum ada proyek yang cocok.</p>
    </section>
@endforelse
@endsection
