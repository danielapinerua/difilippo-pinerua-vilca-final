@extends('welcome')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard_admin/categories.css') }}">
@endpush

@section('title', 'Categorías — Panel de administración')

@section('content')

<div class="page-admin-categories">

  <section class="stc-section">
    <a href="{{ route('admin.dashboard') }}" class="admin-back-link admin-back-link-top">← Volver al panel</a>
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
                <div class="admin-actions-group">
                  @if($category->trashed())
                    <form action="{{ route('categories.restore', $category->id) }}" method="POST" class="form-delete-inline">
                      @csrf
                      @method('PATCH')
                      <button type="submit" class="stc-btn stc-btn-ghost admin-action-btn" onclick="return confirm('¿Estás seguro de restaurar esta categoría?')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 7v6h6"></path><path d="M21 17a9 9 0 0 0-9-9 9 9 0 0 0-6 2.3L3 13"></path></svg>
                        Restaurar
                      </button>
                    </form>
                  @else
                    <a href="{{ route('categories.edit', $category->id) }}" class="stc-btn stc-btn-ghost admin-action-btn">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                      Editar
                    </a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="form-delete-inline">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="admin-btn-danger admin-action-btn" onclick="return confirm('¿Estás seguro de eliminar esta categoría?')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                        Eliminar
                      </button>
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