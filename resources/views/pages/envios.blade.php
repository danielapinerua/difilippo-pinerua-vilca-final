@extends('layouts.layout')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/about.css') }}">
@endpush

@section('title', 'Envíos — Vivra')

@section('content')

<div class="page-about">

  {{-- HERO --}}
  <section class="stc-hero">
    <div class="stc-hero-copy">
      <span class="eyebrow">Información</span>
      <h1>Envíos</h1>
      <p class="stc-hero-lead">
        Realizamos envíos a todo el país para que puedas disfrutar productos sin TACC donde estés.
      </p>
    </div>
  </section>

  {{-- INFO ENVÍOS --}}
  <section class="stc-section">
    <div class="stc-section-head">
      <span class="eyebrow">Cómo funciona</span>
      <h2>Todo lo que tenés que saber</h2>
    </div>

    <div class="stc-text-block">
      <p>Enviamos a todo el territorio nacional.</p>
      <p>Tiempo de entrega estimado: entre 3 y 7 días hábiles.</p>
      <p>Trabajamos con servicios de correo confiables.</p>
      <p>📍 Podés seguir tu pedido una vez despachado.</p>
    </div>
  </section>

  {{-- COSTOS --}}
  <section class="stc-section">
    <div class="stc-section-head">
      <span class="eyebrow">Costos</span>
      <h2>Tarifas de envío</h2>
    </div>

    <div class="stc-text-block">
      <p> El costo del envío se calcula automáticamente al finalizar la compra.</p>
      <p>Envío gratis en compras superiores a cierto monto (opcional si querés agregar).</p>
    </div>
  </section>

  {{-- CTA --}}
  <section class="stc-about-cta">
    <span class="eyebrow">Comprar</span>
    <h2>Descubrí nuestros productos</h2>
    <a href="{{ route('catalog') }}" class="stc-btn stc-btn-primary">Ir al catálogo</a>
  </section>

</div>

@endsection