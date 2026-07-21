@extends('welcome')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard_admin/categories.css') }}">
@endpush

@section('title', 'Categorías — Panel de administración')

@section('content')

<div class="page-admin-categories">

  <section class="stc-section">
    <a href="{{ route('admin.dashboard') }}" class="admin-back-link" style="margin-bottom: 24px; display: inline-block;">← Volver al panel</a>
    <div class="stc-section-head">
      <div class="stc-section-head-main">
        <span class="eyebrow">Panel</span>
        <h2>Gestión de categorías</h2>
        <p class="admin-sub">Creá, editá y administrá las categorías del catálogo.</p>
      </div>
      <a href="{{ route('categories.create') }}" class="stc-btn stc-btn-primary">Nueva categoría</a>
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
            <th>Nombre</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @forelse($categories as $category)
            <tr class="{{ $category->trashed() ? 'is-trashed' : '' }}">
              <td>{{ $category->id }}</td>
              <td>
                {{ $category->name }}
                @if($category->trashed())
                  <span class="admin-tag-deleted">Eliminada</span>
                @endif
              </td>
              <td>
                <div class="admin-table-actions">
                  @if($category->trashed())
                    <form action="{{ route('categories.restore', $category->id) }}" method="POST">
                      @csrf
                      @method('PATCH')
                      <button type="submit" class="stc-btn stc-btn-ghost" onclick="return confirm('¿Estás seguro de restaurar esta categoría?')">Restaurar</button>
                    </form>
                  @else
                    <a href="{{ route('categories.edit', $category->id) }}" class="stc-btn stc-btn-ghost">Editar</a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="admin-btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta categoría?')">Eliminar</button>
                    </form>
                  @endif
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="3" class="admin-table-empty">No hay categorías creadas.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

  </section>

</div>

@endsection