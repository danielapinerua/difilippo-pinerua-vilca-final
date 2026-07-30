@extends('layouts.layout')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard_admin/orders.css') }}">
@endpush

@section('title', 'Confirmar Cancelación — Panel de administración')

@section('content')

<div class="page-admin-categories">
  <section class="stc-section">
    <div class="cancel-page-wrapper">
        <h2 class="cancel-title">Confirmar Cancelación</h2>
        <p class="cancel-desc">¿Estás seguro que deseas cancelar el Pedido #{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}?</p>
        
        <div class="cancel-actions">
            <a href="{{ route('admin.orders.show', $order->id) }}" class="stc-btn stc-btn-ghost text-decoration-none">Volver</a>
            
            <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="m-0">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="cancelado">
                <button type="submit" class="stc-btn btn-cancel-confirm">Confirmar Cancelación</button>
            </form>
        </div>
    </div>
  </section>
</div>

@endsection
