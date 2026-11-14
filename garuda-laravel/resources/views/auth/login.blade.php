@extends('layouts.app')

@section('title', 'Masuk')

@section('content')
<section class="card" aria-labelledby="judul-login">
    <h1 id="judul-login">Masuk</h1>

    <form method="POST" action="{{ route('login') }}" novalidate>
        @csrf

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}"
               autocomplete="email" required autofocus
               @error('email') aria-invalid="true" aria-describedby="email-error" @enderror>
        @error('email')
            <p class="flash err" id="email-error" role="alert">{{ $message }}</p>
        @enderror

        <label for="password">Password</label>
        <input type="password" id="password" name="password"
               autocomplete="current-password" required
               @error('password') aria-invalid="true" aria-describedby="password-error" @enderror>
        @error('password')
            <p class="flash err" id="password-error" role="alert">{{ $message }}</p>
        @enderror

        <p><button type="submit">Masuk</button></p>
    </form>

    <p class="muted">Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a>.</p>
</section>
@endsection
