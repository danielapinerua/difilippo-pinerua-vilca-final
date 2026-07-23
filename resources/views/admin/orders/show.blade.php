@extends('welcome')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard_admin/categories.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard_admin/orders.css') }}">
@endpush

@section('title', 'Detalle de Pedido — Panel de administración')

@section('content')

<div class="page-admin-categories">

  <section class="stc-section">
    <a href="{{ route('admin.orders.index') }}" class="admin-back-link admin-back-link-top">← Volver al listado</a>
    <div class="stc-section-head">
      <div class="stc-section-head-main">
        <span class="eyebrow">Pedido #{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</span>
        <h2>Detalles del Pedido</h2>
        <p class="admin-sub">Revisá los ítems y gestioná el estado de entrega.</p>
      </div>
      <span class="order-status-tag status-{{ strtolower($order->status->value) }} text-lg">
        {{ ucfirst($order->status->value) }}
      </span>
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

    <div class="order-details-grid">
      <!-- Sección 1: Detalles del Cliente -->
      <div class="order-card">
        <h3>Información del Cliente</h3>
        <p><strong>Nombre:</strong> {{ $order->usuario->nombre }}</p>
        <p><strong>Email:</strong> {{ $order->usuario->email }}</p>
        <p><strong>Fecha de compra:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
        <p><strong>Total pagado:</strong> ${{ number_format($order->total, 2, ',', '.') }}</p>
      </div>

      <!-- Sección 3: Gestión de Estado -->
      <div class="order-card">
        <h3>Gestión de Estado</h3>
        @if(in_array($order->status->value, [\App\Enums\OrderStatus::ENTREGADO->value, \App\Enums\OrderStatus::CANCELADO->value]))
            <div class="order-closed-msg">
                Este pedido ya está cerrado ({{ ucfirst($order->status->value) }}) y no admite cambios.
            </div>
        @else
            <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="order-status-form">
                @csrf
                @method('PUT')
                
                <label for="status">Actualizar estado a:</label>
                <div class="d-flex gap-2 mt-2">
                    <select name="status" id="status" class="admin-form-input order-status-select">
                        @if($order->status->value == \App\Enums\OrderStatus::PENDIENTE->value)
                            <option value="{{ \App\Enums\OrderStatus::PAGADO->value }}">Pagado</option>
                            <option value="{{ \App\Enums\OrderStatus::CANCELADO->value }}">Cancelado</option>
                        @elseif($order->status->value == \App\Enums\OrderStatus::PAGADO->value)
                            <option value="{{ \App\Enums\OrderStatus::ENVIADO->value }}">Enviado</option>
                            <option value="{{ \App\Enums\OrderStatus::CANCELADO->value }}">Cancelado</option>
                        @elseif($order->status->value == \App\Enums\OrderStatus::ENVIADO->value)
                            <option value="{{ \App\Enums\OrderStatus::ENTREGADO->value }}">Entregado</option>
                        @endif
                    </select>
                    <button type="submit" class="stc-btn stc-btn-primary">Actualizar</button>
                </div>
            </form>
        @endif
      </div>
    </div>

    <!-- Sección 2: Productos -->
    <h3 class="order-items-title">Ítems del Pedido</h3>
    <div class="admin-table-wrap">
      <table class="admin-table">
        <thead>
          <tr>
            <th>Producto</th>
            <th>Precio Unitario</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <tbody>
          @foreach($order->items as $item)
            <tr>
              <td>
                <div class="order-item-product">
                    @if($item->product && $item->product->image)
                        <img src="{{ asset('storage/' . $item->product->image) }}" alt="img" class="order-item-image">
                    @else
                        <div class="order-item-placeholder"></div>
                    @endif
                    <span>{{ $item->product ? $item->product->name : 'Producto Eliminado' }}</span>
                </div>
              </td>
              <td>${{ number_format($item->unit_price, 2, ',', '.') }}</td>
              <td>{{ $item->quantity }}</td>
              <td><strong>${{ number_format($item->unit_price * $item->quantity, 2, ',', '.') }}</strong></td>
            </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td colspan="3" class="order-total-label">Total:</td>
            <td class="order-total-value">${{ number_format($order->total, 2, ',', '.') }}</td>
          </tr>
        </tfoot>
      </table>
    </div>

  </section>

</div>

@endsection
