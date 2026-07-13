<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
</head>
<body>
    <h1>Editar Usuario</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Nombre:</label><br>
            <input type="text" name="nombre" value="{{ old('nombre', $usuario->nombre) }}" required>
        </div>

        <div>
            <label>Email:</label><br>
            <input type="email" name="email" value="{{ old('email', $usuario->email) }}" required>
        </div>

        <div>
            <label>
                Admin:
                <input type="checkbox" name="es_admin" value="1" {{ $usuario->es_admin ? 'checked' : '' }}>
            </label>
        </div>

        <button type="submit">Actualizar Usuario</button>
    </form>

    <br>
    <a href="{{ route('usuarios.index') }}">Cancelar y volver</a>
</body>
</html>