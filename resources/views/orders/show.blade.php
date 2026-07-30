@extends('layouts.layout')

@section('title', 'Detalle del Pedido #' . str_pad($order->id, 5, '0', STR_PAD_LEFT))

@push('styles')
<link rel="stylesheet" href="{{ asset('css/store/order-show.css') }}">
@endpush

@section('content')
<div class="os-container">
    <header class="os-header">
        <a href="{{ route('orders.index') }}" class="os-back-link">← Volver a Mis Compras</a>
        <h1>Pedido #{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</h1>
        <p class="os-date">Realizado el {{ $order->created_at->format('d/m/Y') }} a las {{ $order->created_at->format('H:i') }}</p>
    </header>

    <div class="os-grid">
        <!-- COLUMNA IZQUIERDA: PRODUCTOS -->
        <div class="os-items-col">
            <h2 class="os-section-title">Artículos de tu compra</h2>
            <div class="os-items-list">
                @foreach ($order->items as $item)
                    <div class="os-item-card">
                        <div class="os-item-image-wrapper">
                            @if ($item->product && $item->product->image)
                                <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="os-item-image">
                            @else
                                <div class="os-item-placeholder"></div>
                            @endif
                        </div>
                        
                        <div class="os-item-details">
                            <h3 class="os-item-name">{{ $item->product ? $item->product->name : 'Producto Eliminado' }}</h3>
                            <span class="os-item-price-unit">${{ number_format($item->unit_price, 2, ',', '.') }} c/u</span>
                        </div>

                        <div class="os-item-qty">
                            <span class="os-qty-badge">{{ $item->quantity }}x</span>
                        </div>

                        <div class="os-item-subtotal">
                            ${{ number_format($item->unit_price * $item->quantity, 2, ',', '.') }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- COLUMNA DERECHA: TICKET / RESUMEN -->
        <div class="os-summary-col">
            <div class="os-ticket">
                <h2 class="os-ticket-title">Resumen de Compra</h2>
                
                <div class="os-ticket-status">
                    <span class="os-status-label">Estado actual:</span>
                    <span class="os-status-badge os-status-{{ strtolower($order->status->value) }}">
                        {{ ucfirst($order->status->value) }}
                    </span>
                </div>

                @php
                    $states = ['pendiente', 'pagado', 'enviado', 'entregado'];
                    $currentStatus = strtolower($order->status->value);
                    $currentIndex = array_search($currentStatus, $states);
                    $isCancelled = $currentStatus === 'cancelado';
                @endphp

                <div class="os-timeline-container {{ $isCancelled ? 'os-timeline-cancelled' : '' }}">
                    @if($isCancelled)
                        <div class="os-timeline-item">
                            <div class="os-timeline-node os-node-cancelled">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                            </div>
                            <div class="os-timeline-content">
                                <span class="os-timeline-label os-label-cancelled">
                                    Pedido Cancelado
                                </span>
                            </div>
                        </div>
                    @else
                        @foreach($states as $index => $state)
                            @php
                                $isCompleted = $index <= $currentIndex;
                                $isActive = $index === $currentIndex;
                                
                                if ($isCompleted) {
                                    $nodeClass = 'os-node-completed' . ($isActive ? ' os-node-current' : '');
                                    $labelClass = 'os-label-completed' . ($isActive ? ' os-label-current' : '');
                                } else {
                                    $nodeClass = 'os-node-future';
                                    $labelClass = 'os-label-future';
                                }
                            @endphp

                            <div class="os-timeline-item">
                                <div class="os-timeline-node {{ $nodeClass }}">
                                    @if($isCompleted)
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    @endif
                                </div>
                                <div class="os-timeline-content">
                                    <span class="os-timeline-label {{ $labelClass }}">
                                        {{ ucfirst($state) }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                <div class="os-ticket-divider"></div>

                <div class="os-ticket-row os-ticket-total">
                    <span class="os-ticket-label">Total Final</span>
                    <span class="os-ticket-value">${{ number_format($order->total, 2, ',', '.') }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
