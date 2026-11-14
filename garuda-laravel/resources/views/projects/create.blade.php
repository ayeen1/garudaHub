@extends('layouts.app')

@section('title', 'Pasang Proyek')

@section('content')
<section class="card" aria-labelledby="judul-form">
    <h1 id="judul-form">Pasang Proyek Baru</h1>

    <form method="POST" action="{{ route('projects.store') }}" novalidate>
        @csrf

        <label for="title">Judul proyek</label>
        <input type="text" id="title" name="title" value="{{ old('title') }}" maxlength="200" required autofocus>
        @error('title')
            <p class="flash err" role="alert">{{ $message }}</p>
        @enderror

        <label for="category_id">Kategori</label>
        <select id="category_id" name="category_id" required>
            <option value="">-- pilih kategori --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <p class="flash err" role="alert">{{ $message }}</p>
        @enderror

        <label for="description">Deskripsi</label>
        <textarea id="description" name="description" maxlength="5000" required>{{ old('description') }}</textarea>
        @error('description')
            <p class="flash err" role="alert">{{ $message }}</p>
        @enderror

        <fieldset>
            <legend>Budget (Rupiah)</legend>
            <div class="row">
                <div>
                    <label for="budget_min">Minimal</label>
                    <input type="number" id="budget_min" name="budget_min" value="{{ old('budget_min') }}" min="0" step="100000" required>
                    @error('budget_min')
                        <p class="flash err" role="alert">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="budget_max">Maksimal</label>
                    <input type="number" id="budget_max" name="budget_max" value="{{ old('budget_max') }}" min="0" step="100000" required>
                    @error('budget_max')
                        <p class="flash err" role="alert">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </fieldset>

        <label for="deadline">Batas lelang</label>
        <input type="date" id="deadline" name="deadline" value="{{ old('deadline') }}"
               min="{{ now()->addDay()->format('Y-m-d') }}" required>
        @error('deadline')
            <p class="flash err" role="alert">{{ $message }}</p>
        @enderror

        <p>
            <button type="submit">Pasang Proyek</button>
            <a class="btn sec" href="{{ route('projects.index') }}">Batal</a>
        </p>
    </form>
</section>
@endsection
