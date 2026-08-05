# 🎨 Documentación del Frontend (Blade Templates)

El sistema utiliza el motor de plantillas **Blade** de Laravel para la construcción de la interfaz de usuario, implementando una arquitectura reutilizable basada en componentes y *layouts* que permite mantener consistencia visual y un código escalable.

---

## 1. 🏗️ Layouts (Estructura General)
El sistema utiliza una plantilla base para toda la aplicación pública.
- **Archivo Principal**: `resources/views/layouts/layout.blade.php`
- Define la estructura HTML base e incluye dinámicamente el encabezado y pie de página.
- **Características**: Uso de secciones dinámicas (`@yield('title')`, `@yield('content')`) y *stacks* para importar assets específicos por página (`@stack('styles')`, `@stack('scripts')`).

### Componentes del Layout:
- **Header** (`header.blade.php`): Barra de navegación principal. Su renderizado es dinámico utilizando la fachada `Auth`; si es usuario común muestra íconos del carrito, favoritos y rutas de tienda. Si es Administrador muestra accesos directos al panel de control (Dashboard).
- **Footer** (`footer.blade.php`): Pie de página dinámico con información institucional, enlaces de navegación y año autogenerado (`{{ date('Y') }}`).

---

## 2. 🏠 Páginas Informativas y Landing
- **Home / Landing Page** (`home_landing/home.blade.php`): Presentación principal. Incluye *hero* motivacional, presentación de categorías destacadas, información nutricional de productos sin TACC y un fuerte *Call To Action* (CTA).
- **Sobre Nosotros** (`pages/about.blade.php`): Página institucional enfocada en reforzar la confianza del usuario, mostrando la misión y los beneficios del servicio.
- **Envíos** (`pages/envios.blade.php`): Información logística que incluye tiempos de entrega y costos, diseñado para reducir las dudas previas a la compra.

---

## 3. 🔐 Vistas de Autenticación
Ubicadas en `resources/views/auth/`, gestionan el acceso seguro.
- **Login** (`login.blade.php`): Formulario estructurado en dos paneles (branding visual a la izquierda y campos a la derecha). Incorpora protección `@csrf`, retención de datos con `old('email')` y muestra dinámica de errores con `@error`.
- **Registro** (`register.blade.php`): Formulario completo (nombre, email, dirección y contraseñas). Ambas vistas reutilizan el archivo CSS `login.css` para mantener cohesión estética en los procesos de seguridad. Incluye validaciones visuales.

---

## 4. 🛒 Módulo Tienda (Store)
Centraliza la experiencia de e-commerce en `resources/views/store/`.
- **Catálogo de Productos** (`catalog.blade.php`): Grilla principal de venta. Incluye filtros dinámicos por categoría (provenientes de la DB) y rango de precios. Usa la directiva `@forelse` para capturar gracefully cuando una búsqueda no arroja resultados.
- **Detalle de Producto** (`show.blade.php`): Ficha individual. Muestra imagen, descripción, precio y permite seleccionar la cantidad de unidades. Incluye validación de stock, recomendación de productos similares y sección de reseñas (calificación por estrellas).
- **Carrito de Compras** (`cart.blade.php`): Muestra el resumen de la compra temporal. Permite incrementar, decrementar o eliminar artículos. El carrito se gestiona mediante sesiones.
- **Favoritos / Wishlist** (`wishlist.blade.php`): Exclusivo para usuarios logueados, guarda productos deseados para compras futuras.
- **Checkout Exitoso** (`checkout/success.blade.php`): Pantalla final que brinda *feedback* positivo informando el ID de pedido y un resumen al comprador.

---

## 5. 👤 Panel de Perfil de Usuario
Ubicado en `resources/views/profile/`, centraliza la cuenta del cliente.
- **Dashboard** (`index.blade.php`): Pantalla de bienvenida que agrupa la información del usuario y accesos rápidos.
- **Editar Perfil** (`edit.blade.php`): Permite actualizar los datos de contacto y la información de la libreta de direcciones.
- **Seguridad** (`password.blade.php`): Formulario seguro con directiva `@method('PUT')` para modificación de la contraseña.
- **Mis Pedidos** (`orders/`): Vista de historial con un **Timeline visual** que marca el progreso exacto del envío (Pendiente, Pagado, Enviado, Entregado, Cancelado).

---

## 6. ⚙️ Panel de Administración (Admin Dashboard)
Vistas protegidas exclusivas para el rol administrador.
- **Panel Principal** (`dashboard_admin/index.blade.php`): Resumen del sistema con contadores estadísticos de productos, usuarios y ventas.
- **Gestión de Categorías** (`categories/`): Formularios para crear y editar. Soporta visualización de categorías eliminadas lógicamente (`Soft Deletes`) y botones para restaurarlas.
- **Gestión de Productos** (`products/`): Formularios avanzados de creación y edición. Utiliza `enctype="multipart/form-data"` para la carga de archivos de imagen y *checkboxes* múltiples para asignar varias categorías al mismo tiempo.
- **Gestión de Usuarios** (`usuarios/`): Tabla administrativa para revisar roles, suspender o editar datos de clientes.
- **Gestión de Pedidos** (`admin/orders/`): Sistema de despacho donde el administrador puede ver el detalle completo de la orden, los ítems comprados y avanzar el estado del pedido (gatillando cambios en el timeline visual del cliente).

---

## 7. 🎨 Organización de Estilos (CSS)
La aplicación utiliza hojas de estilo en cascada nativas, organizadas de forma altamente modular dentro de `public/css/` para evitar colisiones:
- `base.css`: Variables globales (colores corporativos), tipografía y reseteo básico.
- `layouts/`: `header.css` y `footer.css`.
- `home_landing/`: `home.css`.
- `login/`: `login.css` (reutilizado por registro).
- `store/`: `catalog.css`, `cart.css`, `show.css` y `wishlists.css`.
- `dashboard_admin/`: Archivos para el panel de control y sus módulos (ej. `products.css`, `orders.css`).
