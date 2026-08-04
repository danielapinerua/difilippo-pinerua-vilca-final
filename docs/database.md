# 🗄️ Diccionario de Datos y Migraciones (VIVRA)

A continuación se detalla la estructura completa de la base de datos, enfocada en cómo fueron definidas las migraciones de Laravel.

## 📊 Modelo Entidad-Relación (DER)

![DER VIVRA](./diagramas/DER%20-%20PW.png)

---

## 🏗️ Estructura de Tablas y Migraciones

### 1. Tabla `usuarios`
**Descripción:** Almacena la información principal tanto de clientes regulares como de administradores de la plataforma.
**Relaciones:** 
- **1:N** con `addresses` (Un usuario tiene una dirección física).
- **1:N** con `orders` (Un usuario puede realizar múltiples pedidos).
- **1:N** con `reviews` (Un usuario puede dejar múltiples reseñas).
- **N:M** con `products` a través de `wishlists` (Un usuario puede tener muchos productos favoritos).

| Columna | Tipo de Dato | Modificadores / Restricciones |
| :--- | :--- | :--- |
| `id` | bigint (UNSIGNED) | Primary Key, Auto Increment |
| `nombre` | varchar(255) | |
| `email` | varchar(255) | UNIQUE |
| `password` | varchar(255) | Hashed |
| `es_admin` | boolean | DEFAULT(false) |
| `created_at` / `updated_at` | timestamp | |

---

### 2. Tabla `addresses`
**Descripción:** Almacena los datos de envío y facturación de los usuarios.
**Relaciones:** 
- **N:1** con `usuarios`. Se independizó esta tabla de `usuarios` por normalización; permitiendo que a futuro un usuario pueda cargar múltiples direcciones de entrega sin alterar la tabla principal de autenticación.

| Columna | Tipo de Dato | Modificadores / Restricciones |
| :--- | :--- | :--- |
| `id` | bigint (UNSIGNED) | Primary Key, Auto Increment |
| `usuario_id` | bigint (UNSIGNED) | Foreign Key -> `usuarios(id)` ON DELETE CASCADE |
| `address` | varchar(255) | |
| `city` | varchar(255) | |
| `province` | varchar(255) | |
| `postal_code` | varchar(255) | |
| `created_at` / `updated_at` | timestamp | |

---

### 3. Tabla `categories`
**Descripción:** Define las categorías (ej. Snacks, Harinas) bajo las cuales se agruparán los productos.
**Relaciones:**
- **N:M** con `products` a través de la tabla pivote `category_product`.

| Columna | Tipo de Dato | Modificadores / Restricciones |
| :--- | :--- | :--- |
| `id` | bigint (UNSIGNED) | Primary Key, Auto Increment |
| `name` | varchar(255) | |
| `created_at` / `updated_at` | timestamp | |
| `deleted_at` | timestamp | SoftDeletes |

> 💡 **Nota sobre Migraciones:** Se implementó una segunda migración (`2026_07_10_170711_add_deleted_at_to_categories_table`) para añadir soporte de **SoftDeletes**. Esto asegura que si el administrador borra una categoría, no se rompa la integridad referencial de los productos o pedidos históricos que dependían de ella.

---

### 4. Tabla `products`
**Descripción:** Contiene la información central del inventario (precios, stock, imagen, descripción).
**Relaciones:**
- **N:M** con `categories` (Un producto puede tener varias categorías y viceversa).
- **1:N** con `reviews` (Un producto recibe múltiples valoraciones).

| Columna | Tipo de Dato | Modificadores / Restricciones |
| :--- | :--- | :--- |
| `id` | bigint (UNSIGNED) | Primary Key, Auto Increment |
| `name` | varchar(255) | |
| `description` | text | NULLABLE |
| `price` | decimal(10,2) | |
| `stock` | integer | DEFAULT(0) |
| `image` | varchar(255) | NULLABLE |
| `created_at` / `updated_at` | timestamp | |

---

### 5. Tabla Pivote `category_product`
**Descripción:** Tabla de resolución para la relación de Muchos a Muchos (N:M) entre Productos y Categorías.
**Relaciones:** 
- Conecta fuertemente `products` y `categories` con borrado en cascada.

| Columna | Tipo de Dato | Modificadores / Restricciones |
| :--- | :--- | :--- |
| `id` | bigint (UNSIGNED) | Primary Key, Auto Increment |
| `product_id` | bigint (UNSIGNED) | Foreign Key -> `products(id)` ON DELETE CASCADE |
| `category_id` | bigint (UNSIGNED) | Foreign Key -> `categories(id)` ON DELETE CASCADE |

---

### 6. Tabla `orders`
**Descripción:** Registra las compras de los usuarios y mantiene el estado general de la transacción.
**Relaciones:**
- **N:1** con `usuarios` (La orden le pertenece a un comprador).
- **N:M** con `products` a través del detalle `order_items`.

| Columna | Tipo de Dato | Modificadores / Restricciones |
| :--- | :--- | :--- |
| `id` | bigint (UNSIGNED) | Primary Key, Auto Increment |
| `usuario_id` | bigint (UNSIGNED) | Foreign Key -> `usuarios(id)` ON DELETE CASCADE |
| `total` | decimal(10,2) | DEFAULT(0) |
| `status` | enum | ('Pendiente', 'Pagado', 'En Camino', 'Entregado', 'Cancelado') DEFAULT('Pendiente') |
| `created_at` / `updated_at` | timestamp | |

---

### 7. Tabla Pivote `order_items`
**Descripción:** Es el detalle de línea de cada pedido (Tabla pivote con atributos adicionales).
**Relaciones:** Conecta `orders` y `products`. 
> 💡 **Justificación de diseño:** Esta tabla pivote guarda la `quantity` y el `unit_price`. Esto es fundamental arquitectónicamente para "congelar" el precio que pagó el cliente en el momento exacto de la compra. Si el `price` de la tabla `products` aumenta a futuro, el historial financiero del pedido (`order_items`) permanecerá inmutable.

| Columna | Tipo de Dato | Modificadores / Restricciones |
| :--- | :--- | :--- |
| `id` | bigint (UNSIGNED) | Primary Key, Auto Increment |
| `order_id` | bigint (UNSIGNED) | Foreign Key -> `orders(id)` ON DELETE CASCADE |
| `product_id` | bigint (UNSIGNED) | Foreign Key -> `products(id)` ON DELETE CASCADE |
| `quantity` | integer | |
| `unit_price` | decimal(10,2) | |
| `created_at` / `updated_at` | timestamp | |

---

### 8. Tabla Pivote `reviews`
**Descripción:** Almacena la retroalimentación, puntuación y comentarios de los clientes sobre los productos que han adquirido.
**Relaciones:** Tabla pivote extendida entre `usuarios` y `products`.

| Columna | Tipo de Dato | Modificadores / Restricciones |
| :--- | :--- | :--- |
| `id` | bigint (UNSIGNED) | Primary Key, Auto Increment |
| `usuario_id` | bigint (UNSIGNED) | Foreign Key -> `usuarios(id)` ON DELETE CASCADE |
| `product_id` | bigint (UNSIGNED) | Foreign Key -> `products(id)` ON DELETE CASCADE |
| `rating` | integer | |
| `comment` | text | NULLABLE |
| `created_at` / `updated_at` | timestamp | |

---

### 9. Tabla Pivote `wishlists`
**Descripción:** Guarda la lista de favoritos de cada cliente.
**Relaciones:** Pivote pura (N:M) entre `usuarios` y `products`.
> 💡 **Justificación de diseño:** A diferencia de las otras tablas, aquí se optó por definir una **Clave Primaria Compuesta** (`primary(['usuario_id', 'product_id'])`). Esto impone una restricción a nivel de base de datos que evita que un usuario pueda guardar el mismo producto dos veces en su lista de deseos de forma accidental o por error del frontend.

| Columna | Tipo de Dato | Modificadores / Restricciones |
| :--- | :--- | :--- |
| `usuario_id` | bigint (UNSIGNED) | Foreign Key -> `usuarios(id)` ON DELETE CASCADE (PK Compuesta) |
| `product_id` | bigint (UNSIGNED) | Foreign Key -> `products(id)` ON DELETE CASCADE (PK Compuesta) |
