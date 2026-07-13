@extends('welcome')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/about.css') }}">
@endpush

@section('title', 'Sobre Nosotros — Sin TACC Market')

@section('content')

<div class="page-about">

  {{-- HERO --}}
  <section class="stc-hero" id="about">
    <div class="stc-hero-copy">
      <div class="stc-hero-badge">Desde<br>2023</div>
      <span class="eyebrow">Conocenos</span>
      <h1>Sobre <em>nosotros</em></h1>
      <p class="stc-hero-lead">
        Nuestra tienda nace con el objetivo de facilitar el acceso a alimentos sin TACC para todas las personas que lo necesitan.
      </p>
    </div>
  </section>

  {{-- TEXTO PRINCIPAL --}}
  <section class="stc-section">
    <div class="stc-section-head">
      <span class="eyebrow">Nuestra misión</span>
      <h2>Comer seguro debería ser fácil</h2>
    </div>

    <div class="stc-text-block">
      <p>
        Sabemos que vivir con Enfermedad Celíaca implica un desafío diario, especialmente a la hora de encontrar productos seguros, variados y accesibles.
      </p>

      <p>
        Por eso creamos este espacio: una tienda confiable donde cada producto está cuidadosamente seleccionado para garantizar que sea libre de gluten.
      </p>

      <p>
        Elegir sin gluten no es solo una necesidad para algunos, también puede ser una oportunidad para mejorar la forma en que nos alimentamos.
      </p>
    </div>
  </section>

  {{-- BENEFICIOS --}}
  <section class="stc-nutri-wrap">
    <div class="stc-nutri-copy">
      <span class="eyebrow">Beneficios</span>
      <h2>Por qué elegir productos sin gluten</h2>
    </div>

    <div class="stc-nutri-label">
      <div class="stc-nutri-row"><span>✔ Evitan daños en personas celíacas</span></div>
      <div class="stc-nutri-row"><span>✔ Alimentación más consciente</span></div>
      <div class="stc-nutri-row"><span>✔ Menos procesados</span></div>
      <div class="stc-nutri-row"><span>✔ Nuevas harinas (arroz, maíz, almendra)</span></div>
      <div class="stc-nutri-row"><span>✔ Mejor digestión en personas sensibles</span></div>
      <div class="stc-nutri-row"><span>✔ Más variedad en la dieta</span></div>
      <div class="stc-nutri-row"><span>✔ Hábitos más saludables</span></div>
    </div>
  </section>

  {{-- TESTIMONIOS --}}
  <section class="stc-section">
    <div class="stc-section-head">
      <span class="eyebrow">Opiniones</span>
      <h2>Lo que dicen nuestros clientes</h2>
    </div>

    <div class="stc-cat-grid">

      <div class="stc-cat-card">
        <p>"Antes me costaba muchísimo encontrar productos sin TACC. Esta página me facilitó todo."</p>
        <strong data-initial="D">Daniela, 20 años</strong>
      </div>

      <div class="stc-cat-card">
        <p>"Ahora puedo comprar tranquilo sabiendo que todo es seguro para mi dieta."</p>
        <strong data-initial="M">Marcos, 19 años</strong>
      </div>

      <div class="stc-cat-card">
        <p>"Hay mucha variedad y eso es clave cuando sos celíaco."</p>
        <strong data-initial="G">Gianluca, 24 años</strong>
      </div>

    </div>
  </section>

  {{-- CIERRE / CTA --}}
  <section class="stc-about-cta">
    <span class="eyebrow">Empezá hoy</span>
    <h2>Descubrí todo lo que tenemos para vos</h2>
    <a href="{{ route('home') }}#categorias" class="stc-btn stc-btn-primary">Ver el mercado</a>
  </section>

</div>

@endsection