@extends('welcome')

@section('title', 'Mi Perfil')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/home_landing/home.css') }}">
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endpush

@section('content')
<div class="profile-container">

    <header class="profile-header">
        <span class="eyebrow">Mi Cuenta</span>
        <h1>Hola, {{ $user->nombre }}</h1>
    </header>

    <div class="profile-content">
        <!-- SECCIÓN 1: DATOS PERSONALES -->
        <section class="profile-info-section">
            <div class="profile-info-card">
                <h3>Tus Datos</h3>
                <div class="profile-data-row">
                    <span class="profile-data-label">Nombre</span>
                    <span class="profile-data-value">{{ $user->nombre }}</span>
                </div>
                <div class="profile-data-row">
                    <span class="profile-data-label">Email</span>
                    <span class="profile-data-value">{{ $user->email }}</span>
                </div>
            </div>
        </section>

        <!-- SECCIÓN 2: MENÚ DE ACCIONES (REUTILIZANDO HOME) -->
        <section class="profile-actions-section">
            <h3 class="profile-actions-title">¿Qué querés hacer?</h3>
            <div class="page-home">
                <div class="stc-cat-grid profile-cat-grid">
                    
                    <a href="{{ route('orders.index') }}" class="stc-cat-card">
                        <div class="stc-cat-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                <line x1="12" y1="22.08" x2="12" y2="12"></line>
                            </svg>
                        </div>
                        <h3>Mis Compras</h3>
                        <p class="stc-cat-tag">Historial de pedidos</p>
                    </a>

                    <a href="{{ route('wishlist.index') }}" class="stc-cat-card">
                        <div class="stc-cat-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                            </svg>
                        </div>
                        <h3>Mis Favoritos</h3>
                        <p class="stc-cat-tag">Productos guardados</p>
                    </a>

                </div>
            </div>
        </section>
    </div>

</div>
@endsection
