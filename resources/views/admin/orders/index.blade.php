@extends('welcome')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard_admin/categories.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard_admin/orders.css') }}">
@endpush

@section('title', 'Pedidos — Panel de administración')

@section('content')

<div class="page-admin-categories">

  <section class="stc-section">
    <a href="{{ route('admin.dashboard') }}" class="admin-back-link" style="margin-bottom: 24px; display: inline-block;">← Volver al panel</a>
    <div class="stc-section-head">
      <div class="stc-section-head-main">
        <span class="eyebrow">Panel</span>
        <h2>Gestión de pedidos</h2>
        <p class="admin-sub">Administrá y actualizá los estados de los pedidos de los clientes.</p>
      </div>
    </div>

    @if (session('success'))
      <div class="admin-alert admin-alert-success">
        <strong>Éxito:</strong> {{ session('success') }}
      </div>
    @endif
    @if (session('error'))
      <div class="admin-alert admin-alert-danger" style="background: #f8d7da; color: #721c24; padding: 12px 16px; border-radius: 8px; margin-bottom: 24px;">
        <strong>Error:</strong> {{ session('error') }}
      </div>
    @endif

    <div class="admin-table-wrap">
      <table class="admin-table">
        <thead>
          <tr>
            <th>ID Pedido</th>
            <th>Cliente</th>
            <th>Fecha</th>
            <th>Total</th>
            <th>Estado</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @forelse($orders as $order)
            <tr>
              <td>#{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</td>
              <td>
                {{ $order->usuario->nombre }}<br>
                <small style="color:#666;">{{ $order->usuario->email }}</small>
              </td>
              <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
              <td>${{ number_format($order->total, 2, ',', '.') }}</td>
              <td>
                <span class="order-status-tag status-{{ strtolower($order->status->value) }}">
                  {{ ucfirst($order->status->value) }}
                </span>
              </td>
              <td>
                <div class="admin-table-actions">
                  <a href="{{ route('admin.orders.show', $order->id) }}" class="stc-btn stc-btn-ghost">Ver / Gestionar</a>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="admin-table-empty">No hay pedidos registrados.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
    
    <div style="margin-top: 24px;">
      {{ $orders->links() }}
    </div>

  </section>

</div>

@endsection
