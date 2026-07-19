@extends('welcome')

@section('title', 'Mi Carrito')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/store/cart.css') }}">
@endpush

@section('content')
<div class="container cart-container">
    <h1 class="cart-title">Mi Carrito</h1>

    @if(count($cartItems) > 0)
        <div class="row g-4">
            <div class="col-12 col-lg-8">
                <div class="cart-list d-flex flex-column gap-3">
                    @foreach($cartItems as $item)
                        <div class="cart-item d-flex align-items-center flex-wrap flex-sm-nowrap gap-3">

                            <div class="cart-item-img flex-shrink-0">
                                @if($item['product']->image)
                                    <img src="{{ asset('storage/' . $item['product']->image) }}" alt="{{ $item['product']->name }}">
                                @else
                                    <span class="cart-no-image">Sin Imagen</span>
                                @endif
                            </div>

                            <div class="cart-item-info flex-grow-1">
                                <h2 class="cart-item-title">{{ $item['product']->name }}</h2>
                                <p class="cart-item-unit-price mb-0">Precio unitario: ${{ number_format($item['product']->price, 2, ',', '.') }}</p>
                            </div>

                            <div class="cart-item-controls d-flex align-items-center gap-3 gap-sm-4 ms-auto">
                                <div class="quantity-pill d-flex align-items-center">
                                    <form action="{{ route('cart.decrement', $item['product']->id) }}" method="POST" class="m-0">
                                        @csrf
                                        <button type="submit" class="btn-qty {{ $item['quantity'] <= 1 ? 'disabled' : '' }}" aria-label="Disminuir cantidad" @if ($item['quantity'] <= 1) disabled @endif>-</button>
                                    </form>
                                    <span class="qty-value">{{ $item['quantity'] }}</span>
                                    <form action="{{ route('cart.increment', $item['product']->id) }}" method="POST" class="m-0">
                                        @csrf
                                        <button type="submit" class="btn-qty {{ $item['quantity'] >= $item['product']->stock ? 'disabled' : '' }}" aria-label="Aumentar cantidad" @if ($item['quantity'] >= $item['product']->stock) disabled @endif>+</button>
                                    </form>
                                </div>

                                <div class="cart-item-subtotal">
                                    ${{ number_format($item['subtotal'], 2, ',', '.') }}
                                </div>

                                <form action="{{ route('cart.remove', $item['product']->id) }}" method="POST" class="m-0">
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
            </div>

            <div class="col-12 col-lg-4">
                <div class="cart-summary">
                    <h2 class="summary-title">Resumen de Compra</h2>

                    <ul class="summary-items">
                        @foreach($cartItems as $item)
                            <li class="summary-item-row">
                                <span class="summary-item-name">{{ $item['product']->name }} <span class="summary-item-qty">x{{ $item['quantity'] }}</span></span>
                                <span class="summary-item-subtotal">${{ number_format($item['subtotal'], 2, ',', '.') }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <div class="summary-row d-flex justify-content-between">
                        <span>Productos ({{ collect($cartItems)->sum('quantity') }})</span>
                        <span>${{ number_format($cartTotal, 2, ',', '.') }}</span>
                    </div>
                    <div class="summary-total d-flex justify-content-between">
                        <span>Total</span>
                        <span>${{ number_format($cartTotal, 2, ',', '.') }}</span>
                    </div>

                    @guest
                        <button type="button" data-bs-toggle="modal" data-bs-target="#loginModal" class="stc-btn stc-btn-primary w-100 justify-content-center">Confirmar Compra</button>
                    @endguest
                    @auth
                        <form action="{{ route('checkout.process') }}" method="POST" class="m-0">
                            @csrf
                            <button type="submit" class="stc-btn stc-btn-primary w-100 justify-content-center">Confirmar Compra</button>
                        </form>
                    @endauth

                    <a href="{{ route('store.catalog') }}" class="stc-btn stc-btn-secondary w-100 justify-content-center">Seguir comprando</a>
                </div>
            </div>
        </div>
    @else
        <div class="cart-empty text-center">
            <p class="cart-empty-text mb-3">Tu carrito está vacío.</p>
            <a href="{{ route('store.catalog') }}" class="stc-btn stc-btn-primary">Ir al Catálogo</a>
        </div>
    @endif
</div>
@endsection