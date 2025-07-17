@extends('layouts.guest')

@section('content')
    <h2 class="fw-semibold mb-2 text-center">Hai, Selamat Datang!</h2>
    <p class="text-muted mb-4 text-center">Yuk, masukkan detail Anda untuk melanjutkan.</p>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
            @error('email')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
            @error('password')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-check mb-3">
            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
            <label for="remember_me" class="form-check-label">Remember me</label>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Log in</button>
        </div>
        <div class="mt-3 text-center">
            @if (Route::has('password.request'))
                <a class="text-decoration-underline text-muted" href="{{ route('password.request') }}">
                    Forgot your password?
                </a>
            @endif
        </div>
        <div class="mt-4 text-center text-muted">
            Belum punya akun? <a href="{{ route('register') }}" class="text-primary fw-semibold text-decoration-underline">Daftar Sekarang</a>
        </div>
    </form>
@endsection