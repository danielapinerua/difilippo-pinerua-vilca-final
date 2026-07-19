@extends('welcome')

@section('title', 'Catálogo de Productos')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/store/catalog.css') }}">
@endpush

@section('content')
<div class="container catalog-container">

    <header class="catalog-header">
        <h1>Catálogo de Productos</h1>
    </header>

    <div class="row g-5">

        <!-- Área de Filtros (Aside) -->
        <aside class="col-12 col-lg-2">
            <div class="filters-card">
                <h3>Filtros</h3>

                <div class="filters-group">
                    <h4>Categoría</h4>
                    <ul class="filters-list filters-list-disabled">
                        <li>Snacks</li>
                        <li>Dulces</li>
                        <li>Salados</li>
                        <li>Harinas</li>
                        <li>Congelados</li>
                    </ul>
                </div>

                <div class="filters-group">
                    <h4>Precio</h4>
                    <ul class="filters-list filters-list-disabled">
                        <li>Menor a $2.000</li>
                        <li>$2.000 – $4.000</li>
                        <li>Mayor a $4.000</li>
                    </ul>
                </div>

                <p class="filters-note">Próximamente</p>
            </div>
        </aside>

        <!-- Área Principal de Productos (Main) -->
        <main class="col-12 col-lg-10">

            <div class="product-grid">
                @forelse($products as $product)
                    <div class="product-card">

                        <a href="{{ route('products.show', $product->id) }}" class="product-card-media">
                            <div class="product-image">
                                @if($product->image)
                                    <img
                                        src="{{ asset('storage/' . $product->image) }}"
                                        alt="{{ $product->name }}"
                                        loading="lazy"
                                        onerror="this.outerHTML='<span class=&quot;product-no-image&quot;>Sin Imagen</span>';"
                                    >
                                @else
                                    <span class="product-no-image">Sin Imagen</span>
                                @endif
                            </div>
                        </a>

                        <div class="product-info">
                            <a href="{{ route('products.show', $product->id) }}" class="product-name-link">
                                <h3 class="product-name">{{ $product->name }}</h3>
                            </a>
                            <p class="product-price">
                                ${{ number_format($product->price, 2, ',', '.') }}
                            </p>

                            @if($product->stock > 0)
                                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="product-add-form">
                                    @csrf
                                    <select name="quantity" class="product-qty-select" aria-label="Cantidad">
                                        @for($i = 1; $i <= min(6, $product->stock); $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    <button type="submit" class="product-add-btn">Agregar</button>
                                </form>
                            @else
                                <span class="product-out-of-stock">Sin stock</span>
                            @endif
                        </div>

                    </div>
                @empty
                    <p class="empty-catalog">
                        No hay productos disponibles en este momento.
                    </p>
                @endforelse
            </div>

        </main>

    </div>
</div>
@endsection