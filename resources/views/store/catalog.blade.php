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

        <!-- 🔹 FILTROS -->
        <aside class="col-12 col-lg-2">

            <form method="GET" action="{{ route('catalog') }}">
                <div class="filters-card">
                    <h3>Filtros</h3>
                    
                    <!-- 🟣 CATEGORÍAS DINÁMICAS -->
                    <div class="filters-group">
                        <h4>Categoría</h4>
                        
                        @foreach($categories as $cat)
                            <label>
                                <input 
                                    type="radio" 
                                    name="category" 
                                    value="{{ $cat->name }}"
                                    {{ request('category') == $cat->name ? 'checked' : '' }}
                                >
                                {{ $cat->name }}
                            </label><br>
                        @endforeach
                    </div>

                    <!-- 🟢 PRECIO (visual por ahora) -->
                    <div class="filters-group">
                        <h4>Precio</h4>
                        <label>
                            <input type="radio" name="price" value="low"
                            {{ request('price') == 'low' ? 'checked' : '' }}>
                            Menor a $2.000
                        </label><br>
                        <label>
                            <input type="radio" name="price" value="mid"
                            {{ request('price') == 'mid' ? 'checked' : '' }}>
                            $2.000 – $4.000
                        </label><br>

                        <label>
                            <input type="radio" name="price" value="high"
                            {{ request('price') == 'high' ? 'checked' : '' }}>
                            Mayor a $4.000
                        </label><br>
                    </div>

                    <!-- 🔘 BOTONES -->
                    <button type="submit" class="product-add-btn">
                        Filtrar
                    </button>

                    <a href="{{ route('catalog') }}" class="product-add-btn">
                        Limpiar
                    </a>

                    <p class="filters-note">Próximamente</p>
                </div>
            </form>

        </aside>

        <!-- 🔹 PRODUCTOS -->
        <main class="col-12 col-lg-10">

            <div class="product-grid">
                @forelse($products as $product)
                    <div class="product-card">

                        <!-- 🔗 LINK -->
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

                        <!-- 📦 INFO -->
                        <div class="product-info">

                            <a href="{{ route('products.show', $product->id) }}" class="product-name-link">
                                <h3 class="product-name">{{ $product->name }}</h3>
                            </a>

                            <p class="product-price">
                                ${{ number_format($product->price, 2, ',', '.') }}
                            </p>

                            <!-- 🔥 MOSTRAR CATEGORÍAS (BONUS PRO) -->
                            <p style="font-size: 12px; color: gray;">
                                @foreach($product->categories as $cat)
                                    {{ $cat->name }} 
                                @endforeach
                            </p>

                            @if($product->stock > 0)
                                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="product-add-form">
                                    @csrf
                                    <select name="quantity" class="product-qty-select">
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

            @if ($products->lastPage() > 1)
                <div class="catalog-pagination">
                    <ul class="pagination">
                        {{-- Previous Page Link --}}
                        @if (!$products->onFirstPage())
                            <li class="page-item">
                                <a class="page-link" href="{{ $products->appends(request()->query())->previousPageUrl() }}" rel="prev">&lsaquo;</a>
                            </li>
                        @else
                            <li class="page-item disabled" aria-disabled="true">
                                <span class="page-link">&lsaquo;</span>
                            </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @for ($i = 1; $i <= $products->lastPage(); $i++)
                            @if ($i == $products->currentPage())
                                <li class="page-item active" aria-current="page"><span class="page-link">{{ $i }}</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $products->appends(request()->query())->url($i) }}">{{ $i }}</a></li>
                            @endif
                        @endfor

                        {{-- Next Page Link --}}
                        @if ($products->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $products->appends(request()->query())->nextPageUrl() }}" rel="next">&rsaquo;</a>
                            </li>
                        @else
                            <li class="page-item disabled" aria-disabled="true">
                                <span class="page-link">&rsaquo;</span>
                            </li>
                        @endif
                    </ul>
                </div>
            @endif

        </main>

    </div>
</div>
@endsection