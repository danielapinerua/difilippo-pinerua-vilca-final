@extends('welcome')

@section('title', 'Catálogo de Productos')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/store/catalog.css') }}">
@endpush

@section('content')
<div class="catalog-container">
    
    <header class="catalog-header">
        <h1>Catálogo de Productos</h1>
    </header>

    <div class="catalog-layout">
        
        <!-- Área de Filtros (Aside) -->
        <aside class="catalog-sidebar">
            <!-- Aquí irán los filtros futuros -->
            <div class="filters-placeholder">
                <h3>Filtros</h3>
                <p>Próximamente...</p>
            </div>
        </aside>

        <!-- Área Principal de Productos (Main) -->
        <main class="catalog-main">
            
            <div class="product-grid">
                @forelse($products as $product)
                    <div class="product-card">
                        
                        <div class="product-image">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                            @else
                                <span>Sin Imagen</span>
                            @endif
                        </div>

                        <div class="product-info">
                            <h3 class="product-name">
                                {{ $product->name }}
                            </h3>
                            <p class="product-price">
                                ${{ number_format($product->price, 2, ',', '.') }}
                            </p>
                            
                            <div class="product-actions">
                                <a href="#" class="btn-detail">
                                    Ver detalle
                                </a>
                            </div>
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
