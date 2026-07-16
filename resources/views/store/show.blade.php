@extends('welcome')

@section('title', $product->name . ' | Detalles')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/store/show.css') }}">
@endpush

@section('content')
<div class="product-show-container">
    <main class="product-show-layout">
        
        <section class="product-show-gallery">
            <figure>
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                @else
                    <img src="https://via.placeholder.com/600x600?text=Sin+Imagen" alt="Sin imagen">
                @endif
            </figure>
        </section>

        <section class="product-buybox">
            
            <div class="buybox-header">
                <h1 class="product-title">{{ $product->name }}</h1>
                @guest
                <button type="button" class="btn-wishlist" data-bs-toggle="modal" data-bs-target="#loginModal" aria-label="Agregar a favoritos">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-heart">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                    </svg>
                </button>
                @endguest
                @auth
                <form action="{{ route('wishlist.toggle', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-wishlist {{ auth()->user()->hasFavorited($product) ? 'is-active' : '' }}" aria-label="Agregar a favoritos">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-heart">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                        </svg>
                    </button>
                </form>
                @endauth
            </div>
            
            <h2 class="product-price">${{ number_format($product->price, 2, ',', '.') }}</h2>

            @if($product->stock > 0)
                <div class="product-options">
                    <label for="quantity">Cantidad:</label>
                    <select name="quantity" id="quantity" class="quantity-select" form="addToCartForm">
                        @for($i = 1; $i <= min(6, $product->stock); $i++)
                            <option value="{{ $i }}">{{ $i }} {{ $i == 1 ? 'unidad' : 'unidades' }}</option>
                        @endfor
                    </select>
                </div>
            @else
                <p class="out-of-stock-text">Sin stock</p>
            @endif

            <div class="buybox-actions">
                <!-- Botón comprar ahora -->
                <form action="#" method="POST" id="buyNowForm">
                    @csrf
                    <button type="submit" class="stc-btn stc-btn-buy-now full-width" @if($product->stock <= 0) disabled @endif>Comprar ahora</button>
                </form>

                <form action="{{ route('cart.add', $product->id) }}" method="POST" id="addToCartForm">
                    @csrf
                    <button type="submit" class="stc-btn stc-btn-ghost full-width" @if($product->stock <= 0) disabled @endif>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M4 19a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M12.5 17h-6.5v-14h-2" /><path d="M6 5l14 1l-.86 6.017m-2.64 .983h-10.5" /><path d="M16 19h6" /><path d="M19 16v6" /></svg>
                        Agregar al carrito
                    </button>
                </form>
            </div>
        </section>

    </main>
</div>
@endsection
