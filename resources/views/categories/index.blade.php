<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Categorías</title>
</head>
<body>
    <h1>Gestión de Categorías</h1>

    @if (session('success'))
        <div style="color: green; margin-bottom: 15px;">
            <strong>Éxito:</strong> {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('categories.create') }}" style="display: inline-block; margin-bottom: 15px;">Crear Nueva Categoría</a>

    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; text-align: left;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr style="{{ $category->trashed() ? 'background-color: #f8d7da; color: #721c24;' : '' }}">
                    <td>{{ $category->id }}</td>
                    <td>
                        {{ $category->name }}
                        @if($category->trashed())
                            <strong>(Eliminada)</strong>
                        @endif
                    </td>
                    <td>
                        @if($category->trashed())
                            <form action="{{ route('categories.restore', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" onclick="return confirm('¿Estás seguro de restaurar esta categoría?')">Restaurar</button>
                            </form>
                        @else
                            <a href="{{ route('categories.edit', $category->id) }}">Editar</a> | 
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Estás seguro de eliminar esta categoría?')">Eliminar</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No hay categorías creadas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <br>
    <a href="{{ route('home') }}">Volver al Inicio</a>
</body>
</html>
