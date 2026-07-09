<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - E-commerce</title>
</head>
<body>
    {{-- @extends('layouts.layout') --}}
    {{-- @section('title', 'Login') --}}
    {{-- @push('styles')  <link rel="stylesheet" href="{{ asset('css/login.css') }}">@endpush --}}

    {{-- @section('content') --}}
    <div class="login-container">
        <h2>Login</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            <input type="password" name="password" placeholder="Password" required>

            @error('email')
                <p class="error-msg" style="color: red;">{{ $message }}</p>
            @enderror

            <button type="submit">Ingresar</button>
        </form>
    </div>
    {{-- @endsection --}}
</body>
</html>