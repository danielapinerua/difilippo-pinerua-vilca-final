<div align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" alt="Laravel Logo" width="200"/>
  <h1>🌾 E-Commerce Sin TACC 🌾</h1>
  <p><em>La forma más segura y confiable de comprar productos 100% sin TACC</em></p>

  <!-- Badges -->
  <img src="https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 11" />
  <img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP 8.2" />
  <img src="https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL" />
  <img src="https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap" />
  <img src="https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white" alt="CSS3" />
</div>

<br/>

## 📖 Sobre el Proyecto

Este **E-Commerce** nace de la necesidad de ofrecer un espacio 100% seguro y de confianza para personas celíacas o con sensibilidad. Sabemos que la contaminación cruzada y la incertidumbre al momento de comprar alimentos es un gran problema en el día a día. 

Este sistema resuelve este dolor ofreciendo un catálogo especializado y verificado de productos sin TACC, donde los clientes pueden comprar con total tranquilidad. Esta confianza es respaldada además por las **reseñas y calificaciones de otros miembros de la comunidad**, creando un entorno colaborativo y seguro.

---

## 🎯 Características Principales

### 👤 Cliente (Usuario Final)
- 🛍️ **Navegación Intuitiva:** Explorar el catálogo de productos y filtrar por categorías sin complicaciones.
- ❤️ **Lista de Deseos (Wishlist):** Guardar productos favoritos para futuras compras.
- 🛒 **Gestión de Pedidos:** Realizar compras, definir direcciones de envío y dar seguimiento al estado de sus órdenes.
- ⭐ **Reseñas y Confianza:** Dejar comentarios y calificar (1 a 5 estrellas) los productos adquiridos para ayudar a otros.
- 🚚 **Gestión de Direcciones:** Guardar y administrar múltiples direcciones de entrega.

### 🛡️ Administrador (Gestión de Tienda)
- 📦 **CRUD de Productos:** Crear, leer, actualizar y eliminar artículos del inventario de forma sencilla.
- 🏷️ **Gestión de Categorías:** Organizar los productos de forma lógica para facilitar la búsqueda.
- 📊 **Control de Pedidos:** Gestionar el ciclo de ventas y cambiar el estado de las órdenes para reflejar el progreso del envío.

---

## 🔄 Flujo de Negocio (Estados del Pedido)

El ciclo de vida de un pedido dentro del sistema es claro, lineal y garantiza transparencia para el comprador:

1. 🟡 **Pendiente:** El pedido fue creado y se encuentra a la espera de confirmación de pago.
2. 🟢 **Pagado:** El pago ha sido procesado exitosamente y el pedido entra en etapa de preparación.
3. 🔵 **Enviado:** El paquete ha salido del almacén y va rumbo a la dirección del cliente.
4. ✅ **Entregado:** El pedido llegó a manos del cliente de manera satisfactoria.
5. 🔴 **Cancelado:** *(Estado terminal)* El pedido fue anulado (por el usuario o por un administrador).

---

## 🛠️ Stack Tecnológico y Arquitectura

Este E-commerce está construido siguiendo estrictamente las mejores prácticas y estándares de la industria moderna:

| Tecnología / Concepto | Descripción |
| :--- | :--- |
| **Framework Base** | 🚀 **Laravel 11** (última versión) utilizando PHP 8.2+ |
| **Base de Datos** | 🐬 MySQL con un modelo relacional completamente normalizado |
| **Arquitectura** | 🏗️ **Patrón MVC estricto**, separando claramente la lógica de negocio y las vistas |
| **Frontend** | 🎨 Motor de plantillas **Blade** integrado con **Vite**, estilizado mediante **Bootstrap** y **CSS Puro** |
| **ORM y Relaciones** | 🔗 **Eloquent ORM** con relaciones completas (cero uso de *raw queries*) |
| **Seguridad** | 🛡️ Uso de **Form Requests** para validación robusta y **Middlewares** para Autenticación y Control de Roles |

### 🌐 Componente API REST Adicional
El sistema expone de forma paralela tres (3) *endpoints* RESTful para la integración con clientes externos (probados exitosamente con Postman):
- `GET /api/products` - Lista el catálogo completo de productos.
- `GET /api/products/{id}` - Obtiene el detalle de un producto en específico.
- `GET /api/orders` - Lista el historial de órdenes del usuario autenticado.

---

## 🚀 Instalación y Configuración Local

Sigue este paso a paso infalible para levantar el proyecto en tu entorno local.

**1. Clonar el repositorio y acceder al directorio:**
```bash
git clone https://github.com/tu-usuario/ecommerce-sin-tacc.git
cd ecommerce-sin-tacc
```

**2. Instalar las dependencias de PHP y Node.js:**
```bash
composer install
npm install
```

**3. Configurar variables de entorno (.env):**
Copia el archivo de ejemplo para crear tu entorno local y genera la clave segura de la aplicación.
```bash
cp .env.example .env
php artisan key:generate
```
> ⚠️ **Importante:** Recuerda abrir el archivo `.env` y configurar tus credenciales de base de datos MySQL (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`).

**4. Migrar y popular la base de datos (Seeders):**
Este comando creará todas las tablas (Entidades: Usuarios, Categorías, Productos, Pedidos, Detalles, Reseñas, Wishlist y Direcciones) y las poblará con datos falsos de prueba.
```bash
php artisan migrate --seed
```

**5. Compilar los assets del Frontend (Vite):**
```bash
npm run dev
```

**6. Levantar el servidor local (en una terminal separada):**
```bash
php artisan serve
```
¡Listo! 🎉 El sistema estará disponible ingresando a `http://localhost:8000`.

---

## 🔑 Credenciales de Prueba

Al ejecutar los *seeders* (`--seed`) en el paso 4, se generan usuarios predeterminados con roles específicos para que puedas probar el sistema y sus flujos de inmediato.

| Rol | Correo Electrónico (Email) | Contraseña (Password) |
| :--- | :--- | :--- |
| 🛡️ **Administrador** | `admin@ecommerce.com` | `password` |
| 👤 **Cliente** | `cliente@ecommerce.com` | `password` |

<br/>

<div align="center">
  <strong>Hecho con ❤️ para brindar confianza a la comunidad celíaca.</strong>
</div>
