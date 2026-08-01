@extends('layouts.layout')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/login/login.css') }}">
@endpush

@section('title', 'Registro')

@section('content')
<div class="register-page">
    <div class="container-fluid p-0">
        <div class="row g-0 register-row">

            <!-- 🔹 PANEL DE MARCA -->
            <div class="col-12 col-lg-5 register-brand-panel">
                <div class="register-brand-inner">
                    <a href="{{ route('home') }}" class="register-brand-logo">Vivra</a>

                    <div class="register-brand-copy">
                        <span class="register-eyebrow">Sin TACC · Sin gluten</span>
                        <h1 class="register-brand-title">Horneado con cuidado,<br>para vos.</h1>
                        <p class="register-brand-text">
                            Creá tu cuenta para guardar tus direcciones, seguir tus pedidos
                            y comprar más rápido la próxima vez.
                        </p>
                    </div>

                    <ul class="register-brand-list">
                        <li>Seguimiento de tus pedidos</li>
                        <li>Direcciones guardadas</li>
                        <li>Checkout más rápido</li>
                    </ul>
                </div>
            </div>

            <!-- 🔹 PANEL DE FORMULARIO -->
            <div class="col-12 col-lg-7 register-form-panel">
                <div class="register-form-wrap">

                    <header class="register-form-header">
                        <h2>Creá tu cuenta</h2>
                        <p>Completá tus datos para empezar a comprar.</p>
                    </header>

                    <form method="POST" action="{{ route('register.post') }}" class="register-form" novalidate>
                        @csrf

                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label class="register-label" for="nombre">Nombre</label>
                                <input type="text" id="nombre" name="nombre" class="register-input" placeholder="Tu nombre completo" value="{{ old('nombre') }}" required>
                                @error('nombre')
                                    <p class="error-msg">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="register-label" for="email">Email</label>
                                <input type="email" id="email" name="email" class="register-input" placeholder="nombre@email.com" value="{{ old('email') }}" required>
                                @error('email')
                                    <p class="error-msg">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label class="register-label" for="address">Dirección</label>
                                <input type="text" id="address" name="address" class="register-input" placeholder="Calle y número" value="{{ old('address') }}" required>
                                @error('address')
                                    <p class="error-msg">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-12 col-md-5">
                                <label class="register-label" for="city">Ciudad</label>
                                <input type="text" id="city" name="city" class="register-input" placeholder="Ciudad" value="{{ old('city') }}" required>
                                @error('city')
                                    <p class="error-msg">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-12 col-md-4">
                                <label class="register-label" for="province">Provincia</label>
                                <input type="text" id="province" name="province" class="register-input" placeholder="Provincia" value="{{ old('province') }}" required>
                                @error('province')
                                    <p class="error-msg">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-12 col-md-3">
                                <label class="register-label" for="postal_code">C.P.</label>
                                <input type="text" id="postal_code" name="postal_code" class="register-input" placeholder="0000" value="{{ old('postal_code') }}" required>
                                @error('postal_code')
                                    <p class="error-msg">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="register-label" for="password">Contraseña</label>
                                <input type="password" id="password" name="password" class="register-input" placeholder="Mínimo 8 caracteres" required>
                                @error('password')
                                    <p class="error-msg">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="register-label" for="password_confirmation">Confirmar contraseña</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="register-input" placeholder="Repetí tu contraseña" required>
                            </div>
                        </div>

                        <div class="register-actions">
                            <button type="submit" class="register-btn register-btn-primary">Crear cuenta</button>

                            <div class="register-actions-secondary">
                                <a href="{{ route('login') }}" class="register-btn register-btn-ghost">Ya tengo cuenta</a>
                                <a href="{{ route('home') }}" class="register-btn register-btn-ghost">Cancelar</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection