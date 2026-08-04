# 🔌 Documentación de la API REST (VIVRA)

El proyecto incluye una API REST básica para exponer un subconjunto de la funcionalidad del sistema hacia clientes externos o aplicaciones móviles. 

Todas las peticiones deben incluir la cabecera `Accept: application/json` para asegurar que el sistema devuelva los errores y respuestas en formato JSON en lugar de intentar redirigir a vistas HTML.

---

## 1. Listado de Productos
**Caso de uso:** Se utiliza cuando una aplicación externa (ej. una app móvil) necesita mostrar el catálogo completo de productos disponibles en la tienda.

- **Método:** `GET`
- **Endpoint:** `/api/products`
- **Autenticación:** No requerida.
- **Cabeceras:** `Accept: application/json`

### Ejemplo de Respuesta Exitosa (200 OK)
```json
[
    {
        "id": 1,
        "name": "Fideos Matarazzo sin gluten tirabuzón",
        "description": "Fideos Matarazzo sin gluten de 500 gramos tipo tirabuzón.",
        "price": "2500.00",
        "stock": 19,
        "image": "products/fideosmatarazzo.webp",
        "created_at": "2026-07-23T19:32:16.000000Z",
        "updated_at": "2026-07-26T22:42:02.000000Z"
    },
    {
        "id": 2,
        "name": "Oreo sin gluten",
        "description": "Galletitas Oreo sin gluten de 95 gramos.",
        "price": "1800.00",
        "stock": 13,
        "image": "products/oreossingluten.webp",
        "created_at": "2026-07-23T19:32:16.000000Z",
        "updated_at": "2026-07-23T20:49:57.000000Z"
    }
]
```

---

## 2. Detalle de Producto
**Caso de uso:** Se utiliza cuando el cliente hace clic en un producto específico y se necesita cargar su ficha individual con toda la información detallada.

- **Método:** `GET`
- **Endpoint:** `/api/products/{id}`
- **Autenticación:** No requerida.
- **Cabeceras:** `Accept: application/json`

### Ejemplo de Respuesta Exitosa (200 OK)
```json
{
    "id": 1,
    "name": "Fideos Matarazzo sin gluten tirabuzón",
    "description": "Fideos Matarazzo sin gluten de 500 gramos tipo tirabuzón.",
    "price": "2500.00",
    "stock": 19,
    "image": "products/fideosmatarazzo.webp",
    "created_at": "2026-07-23T19:32:16.000000Z",
    "updated_at": "2026-07-26T22:42:02.000000Z"
}
```

### Respuestas de Error
- `404 Not Found`: Si el ID del producto no existe en la base de datos.

---

## 3. Historial de Pedidos del Usuario
**Caso de uso:** Se utiliza en la sección de "Mi Cuenta" o "Mis Pedidos" para listar todas las compras históricas del usuario que está utilizando la aplicación.

- **Método:** `GET`
- **Endpoint:** `/api/orders`
- **Autenticación:** Requerida (Basic Auth de sesión).
- **Cabeceras:** `Accept: application/json`

> 💡 **Nota de Seguridad:** Este endpoint está protegido por el middleware `auth.basic`. Exige que se envíen las credenciales (Email y Contraseña) en cada petición a través de la cabecera `Authorization`. El sistema filtrará y devolverá **únicamente** los pedidos que le pertenecen al usuario autenticado.

### Ejemplo de Respuesta Exitosa (200 OK)
```json
[
    {
        "id": 1,
        "usuario_id": 2,
        "total": "3600.00",
        "status": "cancelado",
        "created_at": "2026-07-23T20:49:57.000000Z",
        "updated_at": "2026-07-26T22:03:49.000000Z"
    },
    {
        "id": 2,
        "usuario_id": 2,
        "total": "2500.00",
        "status": "pendiente",
        "created_at": "2026-07-26T22:42:02.000000Z",
        "updated_at": "2026-07-26T22:42:02.000000Z"
    }
]
```

### Respuestas de Error
- `401 Unauthenticated`: Devuelto cuando no se envían credenciales de Basic Auth, o cuando el usuario/contraseña son incorrectos. Ejemplo: `{"message": "Unauthenticated."}`
