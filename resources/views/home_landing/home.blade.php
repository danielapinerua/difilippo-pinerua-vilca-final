@extends('welcome')

@section('title', 'Sin TACC Market — Comida real, sin gluten')

@section('content')

  <section class="stc-hero">
    <div class="stc-hero-copy">
      <span class="eyebrow">100% Sin TACC · Hecho en Argentina</span>
      <h1>Comida real, <em>sin gluten</em>, sin vueltas.</h1>
      <p class="stc-hero-lead">
        Panificados, snacks y despensa certificados sin TACC, elaborados en
        pequeños lotes y con envío a todo el país. Comé tranquilo.
      </p>
      <div class="stc-hero-cta">
        <a href="#categorias" class="stc-btn stc-btn-primary">Ver productos</a>
        <a href="#nutricion" class="stc-btn stc-btn-ghost">Por qué elegirnos</a>
      </div>
    </div>

    <div class="stc-hero-visual">
      <div class="stc-jar">
        <div class="stc-jar-badge">100%<br>libre</div>
        <div class="stc-jar-label">
          <span class="stc-mark">SIN TACC</span>
          <small>Certificado · Lote artesanal</small>
        </div>
      </div>
    </div>
  </section>

  {{-- FRANJA DE CONFIANZA --}}
  <div class="stc-strip">
    <div class="stc-strip-item"><strong>+120</strong> productos certificados</div>
    <div class="stc-strip-item"><strong>48hs</strong> envío a todo el país</div>
    <div class="stc-strip-item"><strong>0%</strong> gluten, trigo, avena, cebada</div>
  </div>

  {{-- CATEGORÍAS --}}
  <section class="stc-section" id="categorias">
    <div class="stc-section-head">
      <span class="eyebrow">El mercado</span>
      <h2>Elegí por categoría</h2>
    </div>

    <div class="stc-cat-grid">
      <div class="stc-cat-card">
        <div class="stc-cat-icon"></div>
        <h3>Panificados</h3>
        <p class="stc-cat-tag">Pan, facturas, prepizzas</p>
      </div>
      <div class="stc-cat-card">
        <div class="stc-cat-icon"></div>
        <h3>Snacks</h3>
        <p class="stc-cat-tag">Galletitas, barritas, semillas</p>
      </div>
      <div class="stc-cat-card">
        <div class="stc-cat-icon"></div>
        <h3>Despensa</h3>
        <p class="stc-cat-tag">Harinas, premezclas, pastas</p>
      </div>
      <div class="stc-cat-card">
        <div class="stc-cat-icon"></div>
        <h3>Congelados</h3>
        <p class="stc-cat-tag">Tartas, empanadas, viandas</p>
      </div>
    </div>
  </section>

  {{-- ETIQUETA NUTRICIONAL (elemento distintivo) --}}
  <section class="stc-nutri-wrap" id="nutricion">
    <div class="stc-nutri-copy">
      <span class="eyebrow">Por qué elegirnos</span>
      <h2>Leé la etiqueta. Es toda la explicación que necesitás.</h2>
      <p>
        Cada producto pasa por control de trazas y viene certificado.
        Así de simple, así de transparente.
      </p>
    </div>

    <div class="stc-nutri-label">
      <h3>Compromiso</h3>
      <div class="stc-nutri-row bold">
        <span>Gluten</span><span>0 mg</span>
      </div>
      <div class="stc-nutri-row">
        <span>Trazabilidad</span><span>Lote a lote</span>
      </div>
      <div class="stc-nutri-row">
        <span>Proveedores certificados</span><span>100%</span>
      </div>
      <div class="stc-nutri-row">
        <span>Envío refrigerado disponible</span><span>Sí</span>
      </div>
      <div class="stc-nutri-row">
        <span>Origen</span><span>Productores locales</span>
      </div>
      <p class="stc-nutri-foot">
        * Información sujeta al detalle de cada producto en su ficha individual.
      </p>
    </div>
  </section>

  {{-- CTA FINAL --}}
  <section class="stc-cta-band">
    <span class="eyebrow">Empezá hoy</span>
    <h2>Tu próxima compra sin TACC está a un clic.</h2>
    <div class="stc-hero-cta">
      <a href="#categorias" class="stc-btn stc-btn-primary">Explorar el mercado</a>
    </div>
  </section>

@endsection