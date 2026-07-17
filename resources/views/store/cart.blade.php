@extends('welcome')

@section('title', 'Mi Carrito')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/store/cart.css') }}">
@endpush

@section('content')
<div class="cart-container">
    <h1 class="cart-title">Mi Carrito</h1>
    
    @if(count($cartItems) > 0)
        <div class="cart-layout">
            <div class="cart-list">
                @foreach($cartItems as $item)
                    <div class="cart-item">
                        <div class="cart-item-img">
                            @if($item['product']->image)
                                <img src="{{ asset('storage/' . $item['product']->image) }}" alt="{{ $item['product']->name }}">
                            @else
                                <span style="font-size:12px; color:#999;">Sin Imagen</span>
                            @endif
                        </div>
                        
                        <div class="cart-item-info">
                            <h2 class="cart-item-title">{{ $item['product']->name }}</h2>
                            <p style="margin: 0; font-size: 14px; color: #777;">Precio unitario: ${{ number_format($item['product']->price, 2, ',', '.') }}</p>
                        </div>
                        
                        <div class="cart-item-controls">
                            <!-- Pill Controles -->
                            <div class="quantity-pill">
                                <form action="{{ route('cart.decrement', $item['product']->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn-qty" aria-label="Disminuir cantidad">-</button>
                                </form>
                                <span class="qty-value">{{ $item['quantity'] }}</span>
                                <form action="{{ route('cart.increment', $item['product']->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn-qty" aria-label="Aumentar cantidad">+</button>
                                </form>
                            </div>
                            
                            <div class="cart-item-subtotal">
                                ${{ number_format($item['subtotal'], 2, ',', '.') }}
                            </div>
                            
                            <form action="{{ route('cart.remove', $item['product']->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete-cart" aria-label="Eliminar producto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 7l16 0" />
                                        <path d="M10 11l0 6" />
                                        <path d="M14 11l0 6" />
                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="cart-summary">
                <h2 class="summary-title">Resumen de Compra</h2>
                <div class="summary-row">
                    <span>Productos ({{ count($cartItems) }})</span>
                    <span>${{ number_format($cartTotal, 2, ',', '.') }}</span>
                </div>
                <div class="summary-total">
                    <span>Total</span>
                    <span>${{ number_format($cartTotal, 2, ',', '.') }}</span>
                </div>
                
                @guest
                    <button type="button" data-bs-toggle="modal" data-bs-target="#loginModal" class="stc-btn stc-btn-primary" style="width: 100%; justify-content: center;">Confirmar Compra</button>
                @endguest
                @auth
                    <form action="{{ route('checkout.process') }}" method="POST">
                        @csrf
                        <button type="submit" class="stc-btn stc-btn-primary" style="width: 100%; justify-content: center;">Confirmar Compra</button>
                    </form>
                @endauth
            </div>
        </div>
    @else
        <div class="cart-empty">
            <p style="font-size: 1.1rem; color: var(--cafe-noir);">Tu carrito está vacío.</p>
            <br>
            <a href="{{ route('store.catalog') }}" class="stc-btn stc-btn-primary mt-3">Ir al Catálogo</a>
        </div>
    @endif
</div>
@endsection
