@extends('layouts.layout')
@section('title', 'Login')

@push('styles')  <link rel="stylesheet" href="{{ asset('css/login.css') }}">@endpush

@section('content')
    <div class="login-container">
        <h2>Login</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            <input type="password" name="password" placeholder="Password" required>

            @error('login')
                <p class="error-msg">{{ $message }}</p>
            @enderror

            <button type="submit">Ingresar</button>
        </form>
    </div>
@endsection