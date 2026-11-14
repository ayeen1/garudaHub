@extends('layouts.app')

@section('title', $project->title)

@section('content')
<nav aria-label="Breadcrumb" class="muted">
    <a href="{{ route('projects.index') }}">&larr; Kembali ke daftar proyek</a>
</nav>

<article class="card" aria-labelledby="judul-proyek">
    <h1 id="judul-proyek">
        {{ $project->title }}
        <span class="badge {{ $project->isOpen() ? 'open' : 'closed' }}">{{ $project->statusLabel() }}</span>
    </h1>

    <dl class="muted">
        <dt>Kategori</dt>
        <dd>{{ $project->category->name }}</dd>
        <dt>Klien</dt>
        <dd>{{ $project->client->name }}</dd>
        <dt>Budget</dt>
        <dd>Rp {{ number_format($project->budget_min, 0, ',', '.') }} - Rp {{ number_format($project->budget_max, 0, ',', '.') }}</dd>
        <dt>Batas lelang</dt>
        <dd><time datetime="{{ $project->deadline->format('Y-m-d') }}">{{ $project->deadline->format('d-m-Y') }}</time></dd>
    </dl>

    <p style="white-space: pre-line">{{ $project->description }}</p>

    @if ($project->winningBid)
        <p>
            <strong>Pemenang:</strong> {{ $project->winningBid->developer->name }}
            (Rp {{ number_format($project->winningBid->price, 0, ',', '.') }})
        </p>
    @endif
</article>

<section class="card" aria-labelledby="judul-penawaran">
    <h2 id="judul-penawaran">Penawaran ({{ $project->bids->count() }})</h2>

    @if ($project->bids->isEmpty())
        <p>Belum ada penawaran untuk proyek ini.</p>
    @else
        <table>
            <caption class="sr-only">Daftar penawaran, diurutkan dari harga termurah</caption>
            <thead>
                <tr>
                    <th scope="col">Developer</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Durasi</th>
                    <th scope="col">Proposal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($project->bids as $bid)
                    @php($menang = $project->winning_bid_id === $bid->id)
                    <tr @class(['winner' => $menang])>
                        <td>
                            {{ $bid->developer->name }}
                            @if ($menang)
                                <span class="badge win">Pemenang</span>
                            @endif
                        </td>
                        <td>Rp {{ number_format($bid->price, 0, ',', '.') }}</td>
                        <td>{{ $bid->duration_days }} hari</td>
                        <td>{{ $bid->proposal }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</section>
@endsection
