<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Usuario</title>
</head>
<body>
    <h1>Crear Usuario</h1>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf
        
        <div>
            <label>Nombre:</label><br>
            <input type="text" name="nombre" value="{{ old('nombre') }}" required>
        </div>

        <div>
            <label>Email:</label><br>
            <input type="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label>Password:</label><br>
            <input type="password" name="password" required>
        </div>

        <div>
            <label>
                Admin:
                <input type="checkbox" name="es_admin" value="1">
            </label>
        </div>

        <button type="submit">Guardar Usuario</button>
    </form>

    <br>
    <a href="{{ route('usuarios.index') }}">Cancelar y volver</a>
</body>
</html>