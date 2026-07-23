@extends('welcome')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard_admin/products.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard_admin/forms.css') }}">
@endpush

@section('title', 'Editar Producto — Panel de administración')

@section('content')

<div class="page-admin-products">
  <section class="stc-section">
    <div class="admin-form-container">
      <h2 class="admin-form-title">Editar Producto</h2>

      <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="admin-form-group">
          <label for="name" class="admin-form-label">Nombre del Producto</label>
          <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" class="admin-form-input @error('name') is-invalid @enderror" required>
          @error('name')
            <span class="admin-form-error">{{ $message }}</span>
          @enderror
        </div>

        <div class="admin-form-group">
          <label for="description" class="admin-form-label">Descripción</label>
          <textarea name="description" id="description" class="admin-form-input @error('description') is-invalid @enderror">{{ old('description', $product->description) }}</textarea>
          @error('description')
            <span class="admin-form-error">{{ $message }}</span>
          @enderror
        </div>

        <div class="admin-form-row">
            <div class="admin-form-group">
              <label for="price" class="admin-form-label">Precio</label>
              <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $product->price) }}" class="admin-form-input @error('price') is-invalid @enderror" required>
              @error('price')
                <span class="admin-form-error">{{ $message }}</span>
              @enderror
            </div>

            <div class="admin-form-group">
              <label for="stock" class="admin-form-label">Stock</label>
              <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" class="admin-form-input @error('stock') is-invalid @enderror" required>
              @error('stock')
                <span class="admin-form-error">{{ $message }}</span>
              @enderror
            </div>
        </div>

        <div class="admin-form-group admin-file-group">
          @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="Imagen actual" class="admin-file-preview">
          @endif
          <div class="admin-file-input-wrapper">
            <label for="image" class="admin-form-label">Nueva Imagen (opcional)</label>
            <input type="file" name="image" id="image" accept="image/*" class="admin-form-input admin-file-input @error('image') is-invalid @enderror">
            @error('image')
              <span class="admin-form-error">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="admin-form-group">
          <label class="admin-form-label admin-form-label-spaced">Categorías</label>
          <div class="admin-checkbox-group">
              @foreach($categories as $category)
                  <label class="admin-checkbox-label">
                      <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                          class="admin-checkbox-input"
                          {{ (is_array(old('categories')) && in_array($category->id, old('categories'))) || (!old('categories') && in_array($category->id, $product->categories->pluck('id')->toArray())) ? 'checked' : '' }}>
                      {{ $category->name }}
                  </label>
              @endforeach
          </div>
          @error('categories')
            <span class="admin-form-error">{{ $message }}</span>
          @enderror
        </div>

        <div class="admin-form-actions">
          <button type="submit" class="stc-btn stc-btn-primary">Actualizar Producto</button>
          <a href="{{ route('products.index') }}" class="stc-btn stc-btn-ghost">Cancelar</a>
        </div>
      </form>
    </div>
  </section>
</div>

@endsection