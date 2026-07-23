@extends('welcome')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard_admin/categories.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard_admin/forms.css') }}">
@endpush

@section('title', 'Crear Usuario — Panel de administración')

@section('content')

<div class="page-admin-categories">
  <section class="stc-section">
    <div class="admin-form-container">
      <h2 class="admin-form-title">Crear Usuario</h2>

      <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf

        <div class="admin-form-group">
          <label for="nombre" class="admin-form-label">Nombre</label>
          <input type="text" name="nombre" id="nombre" class="admin-form-input @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" required>
          @error('nombre')
            <span class="admin-form-error">{{ $message }}</span>
          @enderror
        </div>

        <div class="admin-form-group">
          <label for="email" class="admin-form-label">Email</label>
          <input type="email" name="email" id="email" class="admin-form-input @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
          @error('email')
            <span class="admin-form-error">{{ $message }}</span>
          @enderror
        </div>

        <div class="admin-form-group">
          <label for="password" class="admin-form-label">Contraseña</label>
          <input type="password" name="password" id="password" class="admin-form-input @error('password') is-invalid @enderror" required>
          @error('password')
            <span class="admin-form-error">{{ $message }}</span>
          @enderror
        </div>

        <div class="admin-form-group">
          <label class="admin-checkbox-label fw-500">
            <input type="checkbox" name="es_admin" class="admin-checkbox-input" {{ old('es_admin') ? 'checked' : '' }}>
            Es Administrador
          </label>
        </div>

        <div class="admin-form-actions">
          <button type="submit" class="stc-btn stc-btn-primary">Guardar Usuario</button>
          <a href="{{ route('usuarios.index') }}" class="stc-btn stc-btn-ghost">Cancelar</a>
        </div>
      </form>
    </div>
  </section>
</div>

@endsection