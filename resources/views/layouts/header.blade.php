<nav class="navbar navbar-expand-lg stc-nav">
  <div class="container-fluid px-3 px-lg-5">

    <a class="navbar-brand stc-nav-logo" href="{{ Auth::check() && Auth::user()->es_admin ? route('admin.dashboard') : route('home') }}">
      <span class="stc-nav-logo-mark">ST</span>
      Sin TACC Market
    </a>

    <button class="navbar-toggler stc-nav-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#stcNavMenu" aria-controls="stcNavMenu" aria-expanded="false" aria-label="Abrir menú">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="stcNavMenu">

      @if (Auth::check() && Auth::user()->es_admin)

        <ul class="navbar-nav mx-auto mb-3 mb-lg-0 stc-nav-links">
          <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Panel</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">Categorías</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">Productos</a></li>
        </ul>

        <div class="d-flex align-items-center gap-2 stc-nav-actions">
          <span class="admin-nav-badge">Admin</span>

          <form action="{{ route('logout') }}" method="POST" class="stc-nav-logout-form">
            @csrf
            <button type="submit" class="stc-nav-icon" aria-label="Salir">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 8v-2a2 2 0 0 1 2 -2h7a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-2"/><path d="M15 12h-12l3 -3"/><path d="M6 15l-3 -3"/></svg>
            </button>
          </form>
        </div>

      @else

        <ul class="navbar-nav mx-auto mb-3 mb-lg-0 stc-nav-links">
          <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Inicio</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Productos</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('about') }}#about">Sobre Nosotros</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Envíos</a></li>
        </ul>

        <div class="d-flex align-items-center gap-2 stc-nav-actions">
          <div class="stc-nav-icon-group">
            <a href="#" class="stc-nav-icon" aria-label="Cuenta">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            </a>
            <a href="#" class="stc-nav-icon" aria-label="Carrito">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
            </a>

            @auth
              <form action="{{ route('logout') }}" method="POST" class="stc-nav-logout-form">
                @csrf
                <button type="submit" class="stc-nav-icon" aria-label="Salir">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 8v-2a2 2 0 0 1 2 -2h7a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-2"/><path d="M15 12h-12l3 -3"/><path d="M6 15l-3 -3"/></svg>
                </button>
              </form>
            @endauth
          </div>

          @guest
            <a href="{{ route('login') }}" class="stc-btn stc-btn-primary stc-nav-cta">Iniciar sesión</a>
          @endguest
        </div>

      @endif

    </div>
  </div>
</nav>