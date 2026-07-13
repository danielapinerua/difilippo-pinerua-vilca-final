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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>