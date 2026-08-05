# ⚙️ Documentación del Backend (Arquitectura y Capas)

El backend de la aplicación está construido bajo el framework Laravel, siguiendo estrictamente el patrón de arquitectura **MVC (Modelo-Vista-Controlador)** enriquecido. 

Para mantener el código escalable y fácil de mantener, se dividió la lógica del sistema en distintas capas de responsabilidad, aislando las validaciones, la lógica de negocio y las autorizaciones. A continuación se detalla cada capa del sistema (excluyendo los Modelos, detallados en `models.md`).

---

## 🛡️ Form Requests (Capa de Validación)
El sistema centraliza todas las validaciones de datos entrantes utilizando **Form Requests**. Esto mantiene a los controladores completamente limpios de reglas de validación.

- **`CategoryRequest`**: Valida la creación y edición de categorías (`name`: obligatorio, string, máximo 255 caracteres y **único**). Previene categorías duplicadas.
- **`ProductRequest`**: Valida el catálogo de productos asegurando la integridad referencial y de datos (`name` obligatorio, `price` numérico ≥ 0, `stock` entero ≥ 0, validación estricta de imágenes WebP/PNG/JPG hasta 10MB y el envío de un *array* de categorías obligatorio).
- **`RegisterRequest`**: Asegura políticas de contraseñas fuertes (mínimo 8 caracteres, una mayúscula, un número, un símbolo) y valida que se ingrese una dirección física en el mismo formulario.
- **`LoginRequest`**: Valida que se ingrese un email con formato correcto y una contraseña.
- **`CheckoutProcessRequest`**: Valida que el carrito **no esté vacío** antes de comprar y que las cantidades sean números válidos. Utiliza el método `prepareForValidation()` para extraer datos de la sesión antes de procesarlos.
- **`ReviewRequest`**: Valida el sistema de calificación (`rating` entre 1 y 5 estrellas) y asegura que el comentario no esté en blanco.
- **`UpdateProfileRequest`**: Validaciones dinámicas que permiten actualizar el perfil del usuario (nombre, email único excluyendo al propio usuario, y dirección).
- **`UpdatePasswordRequest`**: Valida que se ingrese correctamente la contraseña actual para permitir el cambio a una nueva (con reglas de contraseña fuerte).
- **`UpdateOrderStatusRequest`**: Valida que el administrador envíe un `status` correcto al modificar un pedido.
- **`StoreUsuarioRequest` / `UpdateUsuarioRequest`**: Validan la gestión de creación y edición manual de usuarios desde el panel de administración.

---

## 🚦 Middlewares (Capa de Intercepción)
Se encargan de interceptar las peticiones HTTP para verificar accesos y roles antes de llegar al controlador.

- **`AdminMiddleware`**: Middleware personalizado (registrado bajo el alias `admin` en `bootstrap/app.php`). Intercepta rutas sensibles y redirige si el usuario autenticado no posee el flag `es_admin = true`. Se utiliza para proteger todo el panel de control.
- **`auth.basic`**: Middleware nativo de Laravel. Se utiliza exclusivamente en el archivo `routes/api.php` para exigir que las peticiones a la API envíen cabeceras de HTTP Basic Auth (Email y Password).
- **`auth` / `guest`**: Utilizados para proteger accesos al carrito final, wishlist, panel de usuario y evitar que usuarios logueados vean las pantallas de login/registro.

---

## 👮 Policies (Capa de Autorización)
Implementan seguridad contra vulnerabilidades IDOR (Insecure Direct Object Reference). Aseguran que un usuario solo pueda manipular registros que le pertenecen.

- **`AddressPolicy`**: Garantiza que un usuario solo pueda visualizar, editar o borrar las direcciones de su propiedad. El administrador ("admin") puede ver todo de manera excepcional.
- **`OrderPolicy`**: Asegura que un cliente solo pueda acceder al detalle (factura) de **sus propios pedidos**, impidiendo cambiar el ID en la URL para ver compras de terceros.
- **`ReviewPolicy`**: Restringe la eliminación de una reseña únicamente al usuario que la escribió (o a un administrador moderando la plataforma).
- **`WishlistPolicy`**: Evita que un usuario pueda borrar o manipular favoritos en la wishlist de otra persona.

---

## 🎮 Controllers (Capa de Control)
Son delgados (Thin Controllers). Su única responsabilidad es recibir la Request HTTP, pasar los datos a la capa de Servicios y retornar la Vista (`View`) o una redirección.

### Controladores Públicos y de Tienda
- **`AuthController`**: Gestiona las funciones de `login`, `logout` y `registro`.
- **`CatalogController` / `StoreController`**: Manejan la grilla de productos, aplicando filtros de precios o categorías recibidos desde la URL.
- **`CartController`**: Manipula exclusivamente las sesiones de PHP para guardar, sumar, restar o eliminar artículos del carrito temporal.
- **`CheckoutController`**: Responsable del paso final de compra. Valida la integridad del carrito antes de cobrar.

### Controladores de Usuario (Perfil)
- **`ProfileController`**: Renderiza y procesa la actualización de datos personales y contraseña del cliente activo.
- **`OrderController`**: Obtiene el historial de pedidos y renderiza el "Timeline" visual.
- **`WishlistController`**: Agrega y quita referencias de la base de datos de favoritos.
- **`ReviewController`**: Permite asentar retroalimentación (reseñas) una vez concretada una venta.

### Controladores Administrativos
- **`AdminController`**: Carga todas las estadísticas masivas requeridas por el Dashboard.
- **`ProductController` / `CategoryController` / `UsuarioController`**: Ejecutan el CRUD completo administrativo.
- **`AdminOrderController`**: Permite al rol "admin" visualizar listados completos y alterar el `status` de los pedidos.

---

## 🏗️ Services (Capa de Lógica de Negocio)
La capa más robusta. Contiene la lógica compleja, interactúa con la base de datos y ejecuta transacciones para evitar inconsistencias.

- **`AuthService`**: Ejecuta los intentos de inicio de sesión y la lógica transaccional de registro (crea el usuario y automáticamente vincula una `Address` inicial).
- **`ProductService`**: Abstrae la carga de productos, gestiona de forma simultánea el sync (`attach`/`sync`) de categorías a la tabla pivote y delega el manejo de imágenes a otro servicio.
- **`CategoryService`**: Interfaz limpia para el CRUD de categorías y manejo de *Soft Deletes*.
- **`CartService`**: Centraliza toda la matemática del carrito (cálculo de subtotales, totales, comprobación de existencia del producto).
- **`CheckoutService`**: Transforma la sesión temporal del carrito en registros reales de la DB (`Order` y múltiples `OrderItem`). Descuenta el inventario real (`stock`) de los productos y revierte toda la operación (Transacciones DB) si algo falla.
- **`OrderService`**: Centraliza la validación algorítmica para determinar qué estados (Pending, Shipped, etc.) son correlativos.
- **`OrderItemService`**: Encargado de fijar el precio "congelado" de venta en la tabla pivote en el momento exacto de cobro.
- **`FileService`**: Extrae la responsabilidad de manejo del disco duro (Storage). Toma el archivo de imagen, lo comprime, lo convierte a formato WebP para optimizar tiempos de carga, y devuelve el `path` final.
- **`ReviewService` y `WishlistService`**: Modifican los registros de tablas pivote relacionadas a las interacciones de los usuarios con los productos.
