# 📄 Documento de Análisis Funcional: VIVRA

Este documento detalla el análisis de requerimientos funcionales y no funcionales, actores involucrados, casos de uso, alcance y supuestos para el desarrollo del **Sistema de E-commerce Sin TACC**.

---

## 👥 Actores del Sistema

El sistema ha sido modelado para soportar dos perfiles principales de usuarios, cada uno con responsabilidades y privilegios bien definidos:

- **👤 Cliente:** Usuario final de la plataforma. Su objetivo principal es la adquisición de productos seguros. Puede **registrarse**, **iniciar sesión**, **ver productos**, **realizar pedidos**, **dejar reseñas** en artículos adquiridos y **gestionar su lista de deseos** (wishlist).
- **🛡️ Administrador:** Personal encargado de la gestión de la tienda. Tiene permisos de backoffice para **gestionar productos**, administrar las **categorías** del catálogo y cambiar el estado de los **pedidos** ingresados al sistema.

---

## 🎯 Alcance y Supuestos

Para delimitar el contexto actual del proyecto, se establecen las siguientes condiciones de borde e hipótesis de trabajo:

- ❌ **No se implementará pasarela de pago real.** Los pedidos se asumen pagados o gestionados de manera ficticia (simulación).
- ❌ **No se gestionarán envíos físicos reales ni integraciones logísticas.**
- 💻 **El sistema operará como una simulación** integral y demostrativa de un E-commerce en entorno local/pruebas.
- ✅ **Se asume como verdad absoluta** que todos los productos ingresados y expuestos en el catálogo están certificados como **aptos para consumo y sin TACC**.
