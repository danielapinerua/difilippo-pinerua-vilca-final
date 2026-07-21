@extends('welcome')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard_admin/index.css') }}">
@endpush

@section('title', 'Panel de administración — Sin TACC Market')

@section('content')

<div class="page-admin-dashboard">

  <section class="stc-section">
    <div class="stc-section-head">
      <div class="stc-section-head-main">
        <span class="eyebrow">Panel</span>
        <h2>Hola, {{ Auth::user()->nombre }}</h2>
        <p class="admin-sub">Desde acá gestionás las categorías y productos del mercado.</p>
      </div>
      <span class="admin-role-chip">Admin</span>
    </div>

    {{-- RESUMEN --}}
    <div class="admin-stats-grid">
      <div class="admin-stat-card">
        <span class="admin-stat-number">{{ $stats['categories'] }}</span>
        <span class="admin-stat-label">Categorías</span>
      </div>
      <div class="admin-stat-card">
        <span class="admin-stat-number">{{ $stats['products'] }}</span>
        <span class="admin-stat-label">Productos</span>
      </div>
      <div class="admin-stat-card">
        <span class="admin-stat-number">{{ $stats['users'] }}</span>
        <span class="admin-stat-label">Usuarios</span>
      </div>
    </div>

    {{-- ACCESOS RÁPIDOS --}}
    <div class="admin-panel-grid">

      <div class="admin-panel-card">
        <div class="admin-panel-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 7l9-4 9 4-9 4-9-4z"/><path d="M3 7v10l9 4 9-4V7"/></svg>
        </div>
        <h3>Categorías</h3>
        <p>Creá, editá y organizá las categorías del catálogo.</p>
        <div class="admin-panel-actions">
          <a href="{{ route('categories.index') }}" class="stc-btn stc-btn-ghost">Ver todas</a>
          <a href="{{ route('categories.create') }}" class="stc-btn stc-btn-primary">Nueva categoría</a>
        </div>
      </div>

      <div class="admin-panel-card">
        <div class="admin-panel-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
        </div>
        <h3>Productos</h3>
        <p>Administrá el catálogo completo de productos.</p>
        <div class="admin-panel-actions">
          <a href="{{ route('products.index') }}" class="stc-btn stc-btn-ghost">Ver todos</a>
          <a href="{{ route('products.create') }}" class="stc-btn stc-btn-primary">Nuevo producto</a>
        </div>
      </div>

      <div class="admin-panel-card">
        <div class="admin-panel-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
        </div>
        <h3>Usuarios</h3>
        <p>Gestioná los clientes registrados.</p>
        <div class="admin-panel-actions">
          <a href="{{ route('usuarios.index') }}" class="stc-btn stc-btn-ghost">Ver usuarios</a>
          <a href="{{ route('usuarios.create') }}" class="stc-btn stc-btn-primary">Nuevo usuario</a>
        </div>
      </div>

      <div class="admin-panel-card">
        <div class="admin-panel-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"/><path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"/><path d="M9 14h.01"/><path d="M9 17h.01"/><path d="M12 16l1 1l3 -3"/></svg>
        </div>
        <h3>Pedidos</h3>
        <p>Gestioná los pedidos y sus estados de envío.</p>
        <div class="admin-panel-actions">
          <a href="{{ route('admin.orders.index') }}" class="stc-btn stc-btn-primary full-width" style="width:100%; justify-content:center;">Gestionar pedidos</a>
        </div>
      </div>

    </div>
  </section>

</div>

@endsection