@extends('layouts.layout')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard_admin/categories.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard_admin/orders.css') }}">
@endpush

@section('title', 'Pedidos — Panel de administración')

@section('content')

<div class="page-admin-categories">

  <section class="stc-section">
    <a href="{{ route('admin.dashboard') }}" class="admin-back-link admin-back-link-top">← Volver al panel</a>
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
      <div class="admin-alert admin-alert-danger">
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
              <td data-label="ID Pedido">#{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</td>
              <td data-label="Cliente">
                {{ $order->usuario->nombre }}<br>
                <small class="admin-order-email">{{ $order->usuario->email }}</small>
              </td>
              <td data-label="Fecha">{{ $order->created_at->format('d/m/Y H:i') }}</td>
              <td data-label="Total">${{ number_format($order->total, 2, ',', '.') }}</td>
              <td data-label="Estado">
                <span class="order-status-tag status-{{ strtolower($order->status->value) }}">
                  {{ ucfirst($order->status->value) }}
                </span>
              </td>
              <td data-label="Acciones">
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

    <div class="admin-pagination-wrapper">
      @if ($orders->hasPages())
      <nav class="custom-pagination" role="navigation" aria-label="Navegación de paginación">
          <div class="pagination-info">
              <p>
                  Mostrando 
                  @if ($orders->firstItem())
                      <strong>{{ $orders->firstItem() }}</strong> a <strong>{{ $orders->lastItem() }}</strong>
                  @else
                      {{ $orders->count() }}
                  @endif
                  de <strong>{{ $orders->total() }}</strong> resultados
              </p>
          </div>

          <div class="pagination-links">
              @if ($orders->onFirstPage())
                  <span class="page-link disabled">&laquo; Anterior</span>
              @else
                  <a href="{{ $orders->previousPageUrl() }}" class="page-link" rel="prev">&laquo; Anterior</a>
              @endif

              @foreach(range(1, $orders->lastPage()) as $i)
                  @if($i >= $orders->currentPage() - 2 && $i <= $orders->currentPage() + 2)
                      @if ($i == $orders->currentPage())
                          <span class="page-link active">{{ $i }}</span>
                      @else
                          <a href="{{ $orders->url($i) }}" class="page-link">{{ $i }}</a>
                      @endif
                  @endif
              @endforeach

              @if ($orders->hasMorePages())
                  <a href="{{ $orders->nextPageUrl() }}" class="page-link" rel="next">Siguiente &raquo;</a>
              @else
                  <span class="page-link disabled">Siguiente &raquo;</span>
              @endif
          </div>
      </nav>
      @endif
    </div>

  </section>

</div>

@endsection