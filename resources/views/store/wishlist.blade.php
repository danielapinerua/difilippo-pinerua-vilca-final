@extends('welcome')

@section('title', 'Mis Favoritos')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/store/wishlist.css') }}">
@endpush

@section('content')
<div class="container wishlist-container">
    <h1 class="wishlist-title">Mis Favoritos</h1>

    @if($wishlist->count() > 0)
        <div class="wishlist-list d-flex flex-column gap-3">
            @foreach($wishlist as $product)
                <div class="wishlist-item d-flex align-items-center flex-wrap flex-sm-nowrap gap-3">

                    <div class="wishlist-item-img flex-shrink-0">
                        @if($product->image)
                            <img
                                src="{{ asset('storage/' . $product->image) }}"
                                alt="{{ $product->name }}"
                                onerror="this.outerHTML='<span class=&quot;wishlist-no-image&quot;>Sin Imagen</span>';"
                            >
                        @else
                            <span class="wishlist-no-image">Sin Imagen</span>
                        @endif
                    </div>

                    <div class="wishlist-item-info flex-grow-1">
                        <h2 class="wishlist-item-title">{{ $product->name }}</h2>
                        <p class="wishlist-item-desc">{{ Str::limit($product->description ?? 'Sin descripción', 80) }}</p>
                        <div class="wishlist-item-price">${{ number_format($product->price, 2, ',', '.') }}</div>
                    </div>

                    <div class="wishlist-item-actions d-flex align-items-center gap-2 ms-auto">
                        <a href="{{ route('products.show', $product->id) }}" class="stc-btn stc-btn-primary">Ver Publicación</a>

                        <form action="{{ route('wishlist.destroy', $product->id) }}" method="POST" class="m-0">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-trash" aria-label="Eliminar de favoritos">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
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
    @else
        <div class="wishlist-empty text-center">
            <p class="wishlist-empty-text mb-3">No tienes productos en favoritos.</p>
            <a href="{{ route('catalog') }}" class="stc-btn stc-btn-primary">Ir al Catálogo</a>
        </div>
    @endif
</div>
@endsection