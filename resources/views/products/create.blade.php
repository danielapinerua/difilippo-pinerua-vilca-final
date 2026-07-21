@extends('welcome')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard_admin/products.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard_admin/forms.css') }}">
@endpush

@section('title', 'Crear Producto — Panel de administración')

@section('content')

<div class="page-admin-products">
  <section class="stc-section">
    <div class="admin-form-container">
      <h2 class="admin-form-title">Crear Producto</h2>

      <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="admin-form-group">
          <label for="name" class="admin-form-label">Nombre del Producto</label>
          <input type="text" name="name" id="name" value="{{ old('name') }}" class="admin-form-input @error('name') is-invalid @enderror" required>
          @error('name')
            <span class="admin-form-error">{{ $message }}</span>
          @enderror
        </div>

        <div class="admin-form-group">
          <label for="description" class="admin-form-label">Descripción</label>
          <textarea name="description" id="description" class="admin-form-input @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
          @error('description')
            <span class="admin-form-error">{{ $message }}</span>
          @enderror
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
            <div class="admin-form-group">
              <label for="price" class="admin-form-label">Precio</label>
              <input type="number" step="0.01" name="price" id="price" value="{{ old('price') }}" class="admin-form-input @error('price') is-invalid @enderror" required>
              @error('price')
                <span class="admin-form-error">{{ $message }}</span>
              @enderror
            </div>

            <div class="admin-form-group">
              <label for="stock" class="admin-form-label">Stock</label>
              <input type="number" name="stock" id="stock" value="{{ old('stock') }}" class="admin-form-input @error('stock') is-invalid @enderror" required>
              @error('stock')
                <span class="admin-form-error">{{ $message }}</span>
              @enderror
            </div>
        </div>

        <div class="admin-form-group">
          <label for="image" class="admin-form-label">Imagen del Producto</label>
          <input type="file" name="image" id="image" accept="image/*" class="admin-form-input @error('image') is-invalid @enderror" style="padding: 9px 16px;">
          @error('image')
            <span class="admin-form-error">{{ $message }}</span>
          @enderror
        </div>

        <div class="admin-form-group">
          <label class="admin-form-label" style="margin-bottom: 12px;">Categorías</label>
          <div style="display: flex; flex-direction: column; gap: 8px;">
              @foreach($categories as $category)
                  <label style="display: flex; align-items: center; gap: 8px; font-size: 14px; color: var(--cafe-noir); cursor: pointer;">
                      <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                          {{ is_array(old('categories')) && in_array($category->id, old('categories')) ? 'checked' : '' }}
                          style="width: 16px; height: 16px; accent-color: var(--moss);">
                      {{ $category->name }}
                  </label>
              @endforeach
          </div>
          @error('categories')
            <span class="admin-form-error">{{ $message }}</span>
          @enderror
        </div>

        <div class="admin-form-actions">
          <button type="submit" class="stc-btn stc-btn-primary">Guardar Producto</button>
          <a href="{{ route('products.index') }}" class="stc-btn stc-btn-ghost">Cancelar</a>
        </div>
      </form>
    </div>
  </section>
</div>

@endsection