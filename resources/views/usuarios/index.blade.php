@extends('welcome')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard_admin/categories.css') }}">
@endpush

@section('title', 'Usuarios — Panel de administración')

@section('content')

<div class="page-admin-categories">

  <section class="stc-section">
    <a href="{{ route('admin.dashboard') }}" class="admin-back-link admin-back-link-top">← Volver al panel</a>

    <div class="stc-section-head">
      <div class="stc-section-head-main">
        <span class="eyebrow">Panel</span>
        <h2>Gestión de usuarios</h2>
        <p class="admin-sub">Administrá los usuarios del sistema.</p>
      </div>

      <a href="{{ route('usuarios.create') }}" class="stc-btn stc-btn-primary">
        Nuevo usuario
      </a>
    </div>

    @if (session('success'))
      <div class="admin-alert admin-alert-success">
        {{ session('success') }}
      </div>
    @endif

    <div class="admin-table-wrap">
      <table class="admin-table">

        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Acciones</th>
          </tr>
        </thead>

        <tbody>

          {{-- 🔴 ADMINS --}}
          <tr>
            <td colspan="5"><strong>Administradores</strong></td>
          </tr>

          @forelse($admins as $usuario)
            <tr>
              <td>{{ $usuario->id }}</td>
              <td>{{ $usuario->nombre }}</td>
              <td>{{ $usuario->email }}</td>
              <td>Admin</td>
              <td>
                <div class="admin-actions-group">
                  <a href="{{ route('usuarios.edit', $usuario->id) }}" class="stc-btn stc-btn-ghost admin-action-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                    Editar
                  </a>

                  <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" class="form-delete-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="admin-btn-danger admin-action-btn" onclick="return confirm('¿Eliminar usuario?')">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                      Eliminar
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="admin-table-empty">No hay administradores.</td>
            </tr>
          @endforelse


          {{-- 🔵 CLIENTES --}}
          <tr>
            <td colspan="5"><strong>Clientes</strong></td>
          </tr>

          @forelse($clients as $usuario)
            <tr>
              <td>{{ $usuario->id }}</td>
              <td>{{ $usuario->nombre }}</td>
              <td>{{ $usuario->email }}</td>
              <td>Cliente</td>
              <td>
                <div class="admin-actions-group">
                  <a href="{{ route('usuarios.edit', $usuario->id) }}" class="stc-btn stc-btn-ghost admin-action-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                    Editar
                  </a>

                  <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" class="form-delete-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="admin-btn-danger admin-action-btn" onclick="return confirm('¿Eliminar usuario?')">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                      Eliminar
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="admin-table-empty">No hay clientes.</td>
            </tr>
          @endforelse

        </tbody>

      </table>
    </div>

  </section>

</div>

@endsection