@extends('layouts.layout')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/login/login.css') }}">
@endpush

@section('title', 'Login')

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
                        <h1 class="register-brand-title">Qué bueno<br>verte de nuevo.</h1>
                        <p class="register-brand-text">
                            Ingresá a tu cuenta para ver tus pedidos, tus direcciones
                            guardadas y seguir comprando.
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
                <div class="register-form-wrap register-form-wrap-narrow">

                    <header class="register-form-header">
                        <h2>Iniciar sesión</h2>
                        <p>Ingresá tu email y contraseña para continuar.</p>
                    </header>

                    <form method="POST" action="{{ route('login') }}" class="register-form" novalidate>
                        @csrf

                        <div class="row g-3">
                            <div class="col-12">
                                <label class="register-label" for="email">Email</label>
                                <input type="email" id="email" name="email" class="register-input" placeholder="nombre@email.com" value="{{ old('email') }}" required>
                                @error('email')
                                    <p class="error-msg">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label class="register-label" for="password">Contraseña</label>
                                <input type="password" id="password" name="password" class="register-input" placeholder="Tu contraseña" required>
                                @error('password')
                                    <p class="error-msg">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="register-actions">
                            <button type="submit" class="register-btn register-btn-primary">Ingresar</button>
                            <a href="{{ route('home') }}" class="register-btn register-btn-ghost">Cancelar</a>
                        </div>

                        <p class="register-form-footnote">
                            ¿No tenés cuenta?
                            <a href="{{ route('register') }}">Registrate</a>
                        </p>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection