@extends('layouts.layout')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/login/login.css') }}">
@endpush

@section('title', 'Login')

@section('content')

<div class="d-flex align-items-center justify-content-center min-vh-100 login-bg px-3">
    <div class="login-container col-12 col-sm-8 col-md-6 col-lg-4">
        <h2 class="text-center mb-4">Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            @error('email')
            <p class="error-msg">{{ $message }}</p>
                @enderror

            @error('password')
                <p class="error-msg">{{ $message }}</p>
            @enderror

            <button type="submit" class="btn w-100 login-btn mb-2">Ingresar</button>
            <a href="{{ route('home') }}" class="btn w-100 cancel-btn">Cancelar</a>
        </form>
    </div>
</div>

@endsection
