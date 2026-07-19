@extends('welcome')

@section('title', $product->name . ' | Detalles')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/store/show.css') }}">
@endpush

@section('content')
<div class="container product-show-container">
    <div class="row g-5">

        <section class="col-12 col-lg-6 product-show-gallery">
            <figure>
                @if($product->image)
                    <img
                        src="{{ asset('storage/' . $product->image) }}"
                        alt="{{ $product->name }}"
                        onerror="this.outerHTML='<span class=&quot;product-show-no-image&quot;>Sin Imagen</span>';"
                    >
                @else
                    <span class="product-show-no-image">Sin Imagen</span>
                @endif
            </figure>
        </section>

        <section class="col-12 col-lg-6 product-buybox">

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

            @if($product->description)
                <p class="product-description">{{ $product->description }}</p>
            @endif

            <h2 class="product-price">${{ number_format($product->price, 2, ',', '.') }}</h2>

            @if($product->stock > 0)
                <div class="product-options">
                    <label for="quantity">Cantidad:</label>
                    <select name="quantity" id="quantity" class="quantity-select" form="addToCartForm">
                        @for($i = 1; $i <= min(6, $product->stock); $i++)
                            <option value="{{ $i }}">{{ $i }} {{ $i == 1 ? 'unidad' : 'unidades' }}</option>
                        @endfor
                    </select>
                    <span class="stock-note">{{ $product->stock }} disponibles</span>
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

                @if(session()->has('cart.' . $product->id))
                    <div class="product-in-cart-badge">
                        <span class="product-in-cart-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10"/></svg>
                            Este producto ya está en tu carrito
                        </span>
                        <a href="{{ route('cart.index') }}" class="product-in-cart-link">Ir al carrito</a>
                    </div>
                @else
                    <form action="{{ route('cart.add', $product->id) }}" method="POST" id="addToCartForm">
                        @csrf
                        <button type="submit" class="stc-btn stc-btn-ghost full-width" @if($product->stock <= 0) disabled @endif>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M4 19a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M12.5 17h-6.5v-14h-2" /><path d="M6 5l14 1l-.86 6.017m-2.64 .983h-10.5" /><path d="M16 19h6" /><path d="M19 16v6" /></svg>
                            Agregar al carrito
                        </button>
                    </form>
                @endif
            </div>
        </section>

    </div>

    @if(isset($relatedProducts) && $relatedProducts->count() > 0)
        <section class="related-products">
            <h2 class="related-title">Recomendados para vos</h2>

            <div class="related-grid">
                @foreach($relatedProducts as $related)
                    <a href="{{ route('products.show', $related->id) }}" class="related-card">
                        <div class="related-image">
                            @if($related->image)
                                <img
                                    src="{{ asset('storage/' . $related->image) }}"
                                    alt="{{ $related->name }}"
                                    loading="lazy"
                                    onerror="this.outerHTML='<span class=&quot;related-no-image&quot;>Sin Imagen</span>';"
                                >
                            @else
                                <span class="related-no-image">Sin Imagen</span>
                            @endif
                        </div>
                        <div class="related-info">
                            <h3 class="related-name">{{ $related->name }}</h3>
                            <p class="related-price">${{ number_format($related->price, 2, ',', '.') }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>
    @endif
</div>
@endsection