@extends('welcome')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard_admin/categories.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard_admin/forms.css') }}">
@endpush

@section('title', 'Editar Usuario — Panel de administración')

@section('content')

<div class="page-admin-categories">
  <section class="stc-section">
    <div class="admin-form-container">
      <h2 class="admin-form-title">Editar Usuario</h2>

      <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="admin-form-group">
          <label for="nombre" class="admin-form-label">Nombre</label>
          <input type="text" name="nombre" id="nombre" class="admin-form-input @error('nombre') is-invalid @enderror" value="{{ old('nombre', $usuario->nombre) }}" required>
          @error('nombre')
            <span class="admin-form-error">{{ $message }}</span>
          @enderror
        </div>

        <div class="admin-form-group">
          <label for="email" class="admin-form-label">Email</label>
          <input type="email" name="email" id="email" class="admin-form-input @error('email') is-invalid @enderror" value="{{ old('email', $usuario->email) }}" required>
          @error('email')
            <span class="admin-form-error">{{ $message }}</span>
          @enderror
        </div>

        <div class="admin-form-group">
          <label style="display: flex; align-items: center; gap: 8px; font-size: 14px; color: var(--cafe-noir); cursor: pointer; font-weight: 500;">
            <input type="checkbox" name="es_admin" style="width: 16px; height: 16px; accent-color: var(--moss);" {{ old('es_admin', $usuario->es_admin) ? 'checked' : '' }}>
            Es Administrador
          </label>
        </div>

        <div class="admin-form-actions">
          <button type="submit" class="stc-btn stc-btn-primary">Actualizar Usuario</button>
          <a href="{{ route('usuarios.index') }}" class="stc-btn stc-btn-ghost">Cancelar</a>
        </div>
      </form>
    </div>
  </section>
</div>

@endsection