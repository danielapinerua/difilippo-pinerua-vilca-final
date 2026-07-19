@extends('welcome')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard_admin/categories.css') }}">
@endpush

@section('title', 'Usuarios — Panel de administración')

@section('content')

<div class="page-admin-categories">

  <section class="stc-section">

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
                <div class="admin-table-actions">
                  <a href="{{ route('usuarios.edit', $usuario->id) }}" class="stc-btn stc-btn-ghost">
                    Editar
                  </a>

                  <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="admin-btn-danger" onclick="return confirm('¿Eliminar usuario?')">
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
                <div class="admin-table-actions">
                  <a href="{{ route('usuarios.edit', $usuario->id) }}" class="stc-btn stc-btn-ghost">
                    Editar
                  </a>

                  <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="admin-btn-danger" onclick="return confirm('¿Eliminar usuario?')">
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

    <a href="{{ route('admin.dashboard') }}" class="admin-back-link">
      ← Volver al panel
    </a>

  </section>

</div>

@endsection