@extends('welcome')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard_admin/products.css') }}">
@endpush

@section('title', 'Productos — Panel de administración')

@section('content')

<div class="page-admin-products">

  <section class="stc-section">
    <a href="{{ route('admin.dashboard') }}" class="admin-back-link" style="margin-bottom: 24px; display: inline-block;">← Volver al panel</a>
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
                <div class="admin-table-actions">
                  <a href="{{ route('products.edit', $product->id) }}" class="stc-btn stc-btn-ghost">Editar</a>
                  <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="admin-btn-danger" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</button>
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