<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <h1>Inicio del Sistema</h1>

    @auth
        <h2>Bienvenido, {{ Auth::user()->nombre ?? Auth::user()->name }}!</h2>
        
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Cerrar Sesión</button>
        </form>
    @endauth

    @guest
        <p>No estás logueado.</p>
        <a href="{{ route('login') }}">Ir a Iniciar Sesión</a>
    @endguest
</body>
</html>
