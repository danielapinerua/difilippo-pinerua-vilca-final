
@push('styles')
<link rel="stylesheet" href="{{ asset('css/layouts/footer.css') }}">
@endpush

<footer class="stc-footer">
  <div class="stc-footer-top">
    <div class="stc-footer-brand">
      <span class="stc-nav-logo-mark">ST</span>
      <div>
        <p class="stc-footer-brand-name">Sin TACC Market</p>
        <p class="stc-footer-brand-tag">Comida real, sin gluten, sin vueltas.</p>
      </div>
    </div>

    <div class="stc-footer-col">
      <span class="eyebrow">Mercado</span>
      <a href="{{ url('/landing') }}#categorias">Panificados</a>
      <a href="{{ url('/landing') }}#categorias">Snacks</a>
      <a href="{{ url('/landing') }}#categorias">Despensa</a>
    </div>

    <div class="stc-footer-col">
      <span class="eyebrow">Ayuda</span>
      <a href="#">Envíos</a>
      <a href="#">Certificaciones</a>
      <a href="#">Contacto</a>
    </div>
  </div>

  <div class="stc-footer-bottom">
    <p>© {{ date('Y') }} Sin TACC Market. Todos los derechos reservados.</p>
  </div>
</footer>