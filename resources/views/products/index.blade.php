<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Productos</title>
</head>
<body>
    <h1>Gestión de Productos</h1>

    @if (session('success'))
        <div style="color: green; margin-bottom: 15px;">
            <strong>Éxito:</strong> {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('products.create') }}" style="display: inline-block; margin-bottom: 15px;">
        Crear Nuevo Producto
    </a>

    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; text-align: left;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Imagen</th> <!-- 👈 nuevo -->
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>${{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" width="80">
                        @else
                            Sin imagen
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}">Editar</a> | 
                        
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este producto?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No hay productos creados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <br>
    <a href="{{ route('home') }}">Volver al Inicio</a>
</body>
</html>