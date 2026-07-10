<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Categoría</title>
</head>
<body>
    <h1>Crear Categoría</h1>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        
        <div style="margin-bottom: 15px;">
            <label for="name">Nombre de la Categoría:</label><br>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        </div>
        
        <button type="submit">Guardar Categoría</button>
    </form>

    <br>
    <a href="{{ route('categories.index') }}">Cancelar y volver a la lista</a>
</body>
</html>
