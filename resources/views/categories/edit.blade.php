@extends('welcome')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard_admin/categories.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard_admin/forms.css') }}">
@endpush

@section('title', 'Editar Categoría — Panel de administración')

@section('content')

<div class="page-admin-categories">
  <section class="stc-section">
    <div class="admin-form-container">
      <h2 class="admin-form-title">Editar Categoría</h2>

      <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="admin-form-group">
          <label for="name" class="admin-form-label">Nombre de la Categoría</label>
          <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" class="admin-form-input @error('name') is-invalid @enderror" required>
          @error('name')
            <span class="admin-form-error">{{ $message }}</span>
          @enderror
        </div>
        
        <div class="admin-form-actions">
          <button type="submit" class="stc-btn stc-btn-primary">Actualizar Categoría</button>
          <a href="{{ route('categories.index') }}" class="stc-btn stc-btn-ghost">Cancelar</a>
        </div>
      </form>
    </div>
  </section>
</div>

@endsection
