@extends('layouts.layout')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard_admin/products.css') }}">
@endpush

@section('title', 'Productos — Panel de administración')

@section('content')

<div class="page-admin-products">

  <section class="stc-section">
    <a href="{{ route('admin.dashboard') }}" class="admin-back-link admin-back-link-top">← Volver al panel</a>
    <div class="stc-section-head">
      <div class="stc-section-head-main">
        <span class="eyebrow">Panel</span>
        <h2>Gestión de productos</h2>
        <p class="admin-sub">Administrá el catálogo completo de productos.</p>
      </div>
      <a href="{{ route('products.create') }}" class="stc-btn stc-btn-primary">Nuevo producto</a>
    </div>

    @if (session('success'))
      <div class="admin-alert admin-alert-success">
        <strong>Éxito:</strong> {{ session('success') }}
      </div>
    @endif

    <div class="admin-table-wrap">
      <table class="admin-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @forelse($products as $product)
            <tr>
              <td>{{ $product->id }}</td>
              <td>
                @if($product->image)
                  <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="admin-product-thumb">
                @else
                  <span class="admin-no-image">Sin imagen</span>
                @endif
              </td>
              <td>{{ $product->name }}</td>
              <td class="admin-table-desc">{{ $product->description }}</td>
              <td class="admin-table-price">${{ $product->price }}</td>
              <td>
                <span class="admin-stock-badge {{ $product->stock <= 0 ? 'is-empty' : '' }}">
                  {{ $product->stock }}
                </span>
              </td>
              <td>
                <div class="admin-actions-group">
                  <a href="{{ route('products.edit', $product->id) }}" class="stc-btn stc-btn-ghost admin-action-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                    Editar
                  </a>
                  <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="form-delete-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="admin-btn-danger admin-action-btn" onclick="return confirm('¿Estás seguro de eliminar este producto?')">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                      Eliminar
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="7" class="admin-table-empty">No hay productos creados.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

  </section>

</div>

@endsection