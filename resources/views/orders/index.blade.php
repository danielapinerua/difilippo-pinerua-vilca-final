@extends('welcome')

@section('title', 'Mis Compras')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/store/customer-orders.css') }}">
@endpush

@section('content')
<div class="customer-orders-container">
    <header class="customer-orders-header">
        <a href="{{ route('profile.index') }}" class="co-back-link">← Volver al Perfil</a>
        <h1>Historial de Pedidos</h1>
        <p>Revisá el estado de tus compras y su detalle.</p>
    </header>

    <div class="customer-orders-list">
        @forelse ($orders as $order)
            <div class="co-card">
                <div class="co-card-header">
                    <span class="co-order-id">#{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</span>
                    <span class="co-order-status co-status-{{ strtolower($order->status->value) }}">
                        {{ ucfirst($order->status->value) }}
                    </span>
                </div>
                
                <div class="co-card-body">
                    <div class="co-card-info">
                        <span class="co-info-label">Fecha</span>
                        <span class="co-info-value">{{ $order->created_at->format('d/m/Y') }}</span>
                    </div>
                    <div class="co-card-info">
                        <span class="co-info-label">Total</span>
                        <span class="co-info-value co-price">${{ number_format($order->total, 2, ',', '.') }}</span>
                    </div>
                </div>

                <div class="co-card-footer">
                    @if (Route::has('orders.show'))
                        <a href="{{ route('orders.show', $order) }}" class="co-btn-detail">Ver detalle</a>
                    @endif
                </div>
            </div>
        @empty
            <div class="co-empty-state">
                <div class="co-empty-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                </div>
                <h2>Aún no has realizado ninguna compra.</h2>
                <p>Descubrí nuestros productos 100% sin TACC.</p>
                <a href="{{ route('catalog') }}" class="stc-btn stc-btn-primary">Ir a la tienda</a>
            </div>
        @endforelse
    </div>
</div>
@endsection
