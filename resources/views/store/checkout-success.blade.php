@extends('layouts.layout')

@section('title', '¡Gracias por tu compra! — Vivra')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
@endpush

@section('content')
<div class="checkout-success-container">
    <div class="success-card">
        <div class="success-icon">
            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                <polyline points="22 4 12 14.01 9 11.01"></polyline>
            </svg>
        </div>
        <h1 class="success-title">¡Gracias por tu compra!</h1>
        <p class="success-text">Tu pedido #{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }} ha sido confirmado y ya estamos preparándolo con mucho cuidado.</p>
        <p class="success-subtext">Enviamos el comprobante y los detalles a <strong>{{ Auth::user()->email }}</strong>.</p>
        
        <div class="success-actions">
            <a href="{{ route('orders.show', $order->id) }}" class="stc-btn stc-btn-primary">Ver detalles de mi compra</a>
            <a href="{{ route('catalog') }}" class="stc-btn stc-btn-ghost">Seguir comprando</a>
        </div>
    </div>
</div>
@endsection
