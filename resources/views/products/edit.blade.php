<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
</head>
<body>
    <h1>Editar Producto</h1>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div style="margin-bottom: 15px;">
            <label for="name">Nombre del Producto:</label><br>
            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="description">Descripción:</label><br>
            <input type="text" name="description" id="description" value="{{ old('description', $product->description) }}">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="price">Precio:</label><br>
            <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $product->price) }}" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="stock">Stock:</label><br>
            <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" required>
        </div>

        <button type="submit">Actualizar Producto</button>
    </form>

    <br>
    <a href="{{ route('products.index') }}">Cancelar y volver a la lista</a>
</body>
</html>