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
      <div class="order-card">
        <h3>Información de envío</h3>
        @php
            $address = $order->usuario->addresses->first();
        @endphp
        
        <h4 class="order-address-title">Dirección de Envío</h4>
        @if($address)
            <p><strong>Dirección:</strong> {{ $address->address }}</p>
            <p><strong>Ciudad:</strong> {{ $address->city }}, {{ $address->province }}</p>
            <p><strong>Código Postal:</strong> {{ $address->postal_code }}</p>
        @else
            <p><em>El usuario no tiene una dirección registrada.</em></p>
        @endif
      </div>

      <!-- Sección 3: Gestión de Estado -->
      <div class="order-card">
        <h3>Gestión de Estado</h3>
        @php
            $states = ['pendiente', 'pagado', 'enviado', 'entregado'];
            $currentStatus = strtolower($order->status->value);
            $currentIndex = array_search($currentStatus, $states);
            $isCancelled = $currentStatus === 'cancelado';
        @endphp

        <div class="timeline-container">
            @foreach($states as $index => $state)
                @php
                    $isCompleted = !$isCancelled && $index <= $currentIndex;
                    $isNext = !$isCancelled && $index === $currentIndex + 1;
                    $isFuture = $isCancelled || $index > $currentIndex + 1;
                    
                    $nodeClass = '';
                    if ($isCompleted) {
                        $nodeClass = 'node-completed';
                    } elseif ($isNext) {
                        $nodeClass = 'node-next';
                    } else {
                        $nodeClass = 'node-future';
                    }
                @endphp

                <div class="timeline-item">
                    @if($isNext)
                        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="timeline-form">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="{{ $state }}">
                            <button type="submit" class="timeline-node {{ $nodeClass }}" title="Marcar como {{ ucfirst($state) }}"></button>
                        </form>
                    @else
                        <div class="timeline-node {{ $nodeClass }}">
                            @if($isCompleted)
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            @endif
                        </div>
                    @endif
                    <div class="timeline-content">
                        <span class="timeline-label {{ $isCompleted ? 'label-completed' : ($isNext ? 'label-next' : 'label-future') }}">
                            {{ ucfirst($state) }}
                        </span>
                    </div>
                </div>
            @endforeach
        </div>

        @if(!$isCancelled && $currentStatus !== 'entregado')
            <div class="cancel-order-wrapper">
                <a href="{{ route('admin.orders.cancel', $order->id) }}" class="stc-btn stc-btn-ghost btn-cancel-order text-center block-link">Cancelar Pedido</a>
            </div>
        @endif
        
        @if($isCancelled)
            <div class="order-closed-msg">
                Este pedido ha sido Cancelado y no admite cambios.
            </div>
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
