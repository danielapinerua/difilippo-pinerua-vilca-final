# 📄 Documento de Análisis Funcional: E-Commerce Sin TACC

Este documento detalla el análisis de requerimientos funcionales y no funcionales, actores involucrados, casos de uso, alcance y supuestos para el desarrollo del **Sistema de E-commerce Sin TACC**.

---

## 👥 Actores del Sistema

El sistema ha sido modelado para soportar dos perfiles principales de usuarios, cada uno con responsabilidades y privilegios bien definidos:

- **👤 Cliente:** Usuario final de la plataforma. Su objetivo principal es la adquisición de productos seguros. Puede **registrarse**, **iniciar sesión**, **ver productos**, **realizar pedidos**, **dejar reseñas** en artículos adquiridos y **gestionar su lista de deseos** (wishlist).
- **🛡️ Administrador:** Personal encargado de la gestión de la tienda. Tiene permisos de backoffice para **gestionar productos**, administrar las **categorías** del catálogo y cambiar el estado de los **pedidos** ingresados al sistema.

---

## ⚙️ Requisitos Funcionales

Los requerimientos funcionales dictan el comportamiento explícito que debe tener el sistema en respuesta a las interacciones de los actores.

| ID | Requisito Funcional | Actor Principal |
| :---: | :--- | :---: |
| **RF01** | El sistema debe permitir el registro de nuevos usuarios en la plataforma. | Cliente |
| **RF02** | El sistema debe permitir a los usuarios registrados iniciar sesión de forma segura. | Ambos |
| **RF03** | El sistema debe mostrar el catálogo general de productos sin TACC. | Cliente |
| **RF04** | El sistema debe permitir filtrar productos por categoría. | Cliente |
| **RF05** | El sistema debe permitir agregar productos a una lista de deseos (wishlist). | Cliente |
| **RF06** | El sistema debe permitir armar un carrito y realizar pedidos firmes. | Cliente |
| **RF07** | El sistema debe permitir al usuario visualizar el historial y estado de sus pedidos realizados. | Cliente |
| **RF08** | El sistema debe permitir dejar reseñas (calificación y comentarios) en los productos. | Cliente |
| **RF09** | El administrador debe poder ejecutar el CRUD completo (crear, editar y eliminar) de productos. | Administrador |
| **RF10** | El administrador debe poder gestionar y actualizar el estado de los pedidos. | Administrador |
| **RF11** | El sistema debe calcular de manera automática y precisa el importe total del pedido. | Sistema |

---

## 🧩 Casos de Uso Principales

A continuación se enlistan los Casos de Uso clave que describen las interacciones fundamentales entre los actores y la plataforma:

- **CU01:** Registrarse en el sistema.
- **CU02:** Iniciar sesión.
- **CU03:** Navegar y visualizar el catálogo de productos.
- **CU04:** Realizar un pedido.
- **CU05:** Gestionar productos del inventario (Administrador).
- **CU06:** Dejar reseñas en productos.

---

## 🛠️ Requisitos No Funcionales

Estas son las restricciones, estándares y métricas de calidad que definen el rendimiento y la usabilidad de la plataforma.

- **RNF01:** La aplicación debe tener un diseño **completamente responsive**, adaptándose a diferentes tamaños de pantalla.
- **RNF02:** El sistema debe ofrecer tiempos de respuesta óptimos, respondiendo a peticiones estándar en **menos de 3 segundos**.
- **RNF03:** La plataforma debe contar con manejo de errores amigable; los fallos deben mostrarse de **forma clara y comprensible** al usuario, sin exponer lógica interna.
- **RNF04:** Todo el código del proyecto, incluyendo modelos, rutas y controladores, debe estar **debidamente documentado** bajo estándares técnicos (ej. PHPDoc).
- **RNF05:** El sistema debe estar fuertemente enfocado en garantizar su usabilidad y excelente experiencia visual en **dispositivos móviles** (Mobile First).

---

## 🎯 Alcance y Supuestos

Para delimitar el contexto actual del proyecto, se establecen las siguientes condiciones de borde e hipótesis de trabajo:

- ❌ **No se implementará pasarela de pago real.** Los pedidos se asumen pagados o gestionados de manera ficticia (simulación).
- ❌ **No se gestionarán envíos físicos reales ni integraciones logísticas.**
- 💻 **El sistema operará como una simulación** integral y demostrativa de un E-commerce en entorno local/pruebas.
- ✅ **Se asume como verdad absoluta** que todos los productos ingresados y expuestos en el catálogo están certificados como **aptos para consumo y sin TACC**.
