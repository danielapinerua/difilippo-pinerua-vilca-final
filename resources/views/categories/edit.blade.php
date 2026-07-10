<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Categoría</title>
</head>
<body>
    <h1>Editar Categoría</h1>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div style="margin-bottom: 15px;">
            <label for="name">Nombre de la Categoría:</label><br>
            <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" required>
        </div>
        
        <button type="submit">Actualizar Categoría</button>
    </form>

    <br>
    <a href="{{ route('categories.index') }}">Cancelar y volver a la lista</a>
</body>
</html>
