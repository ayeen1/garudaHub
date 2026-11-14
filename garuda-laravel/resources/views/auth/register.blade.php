@extends('layouts.app')

@section('title', 'Daftar')

@section('content')
<section class="card" aria-labelledby="judul-register">
    <h1 id="judul-register">Daftar Akun</h1>

    <form method="POST" action="{{ route('register') }}" novalidate>
        @csrf

        <label for="name">Nama lengkap</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}"
               maxlength="100" autocomplete="name" required autofocus>
        @error('name')
            <p class="flash err" role="alert">{{ $message }}</p>
        @enderror

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}"
               maxlength="100" autocomplete="email" required>
        @error('email')
            <p class="flash err" role="alert">{{ $message }}</p>
        @enderror

        <label for="password">Password <span class="muted">(minimal 8 karakter)</span></label>
        <input type="password" id="password" name="password"
               minlength="8" autocomplete="new-password" required>
        @error('password')
            <p class="flash err" role="alert">{{ $message }}</p>
        @enderror

        <label for="password_confirmation">Ulangi password</label>
        <input type="password" id="password_confirmation" name="password_confirmation"
               minlength="8" autocomplete="new-password" required>

        <fieldset>
            <legend>Daftar sebagai</legend>
            <label>
                <input type="radio" name="role" value="client" @checked(old('role', 'client') === 'client')>
                Klien (pemilik proyek)
            </label>
            <label>
                <input type="radio" name="role" value="developer" @checked(old('role') === 'developer')>
                Developer (pengaju penawaran)
            </label>
        </fieldset>
        @error('role')
            <p class="flash err" role="alert">{{ $message }}</p>
        @enderror

        <p><button type="submit">Daftar</button></p>
    </form>

    <p class="muted">Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>.</p>
</section>
@endsection
