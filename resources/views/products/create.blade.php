<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Producto</title>
</head>
<body>
    <h1>Crear Producto</h1>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div style="margin-bottom: 15px;">
            <label for="name">Nombre del Producto:</label><br>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="description">Descripción:</label><br>
            <input type="text" name="description" id="description" value="{{ old('description') }}">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="price">Precio:</label><br>
            <input type="number" step="0.01" name="price" id="price" value="{{ old('price') }}" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="stock">Stock:</label><br>
            <input type="number" name="stock" id="stock" value="{{ old('stock') }}" required>
        </div>
        <div style="margin-bottom: 15px;">
            <label for="image">Imagen del Producto:</label><br>
            <input type="file" name="image" id="image" accept="image/*">
        </div>

        <div style="margin-bottom: 15px;">
            <label>Categorías:</label><br>
            @foreach($categories as $category)
                <label>
                    <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                        {{ is_array(old('categories')) && in_array($category->id, old('categories')) ? 'checked' : '' }}>
                    {{ $category->name }}
                </label><br>
            @endforeach
            @error('categories')
                <div style="color: red; font-size: 0.9em; margin-top: 5px;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Guardar Producto</button>
    </form>

    <br>
    <a href="{{ route('products.index') }}">Cancelar y volver a la lista</a>
</body>
</html>