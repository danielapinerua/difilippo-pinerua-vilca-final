<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sin TACC Market')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layouts/header.css') }}">
    @stack('styles')
    <link rel="stylesheet" href="{{ asset('css/layouts/footer.css') }}">

</head>
<body>

    <div class="stc-landing">

        @include('layouts.header')

        <main class="stc-main-grow">
            @yield('content')
        </main>

        @include('layouts.footer')

    </div>    
    
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content stc-custom-modal">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Iniciar Sesión</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    Para poder realizar esta acción, necesitas iniciar sesión en tu cuenta.
                </div>
                <div class="modal-footer d-flex justify-content-center gap-2">
                    <button type="button" class="stc-btn stc-btn-ghost" data-bs-dismiss="modal">Cancelar</button>
                    <a href="{{ route('login') }}" class="stc-btn stc-btn-primary">Iniciar sesión</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>