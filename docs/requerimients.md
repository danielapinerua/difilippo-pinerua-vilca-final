# 📃Documentacion de Requerimientos y Casos de Uso para VIVRA

## 📌 Requisitos Funcionales

- **RF01:** El sistema debe permitir el registro de usuarios.
- **RF02:** El sistema debe permitir a los usuarios iniciar sesión.
- **RF03:** El sistema debe mostrar el catálogo de productos sin TACC.
- **RF04:** El sistema debe permitir filtrar productos por categoría.
- **RF05:** El sistema debe permitir agregar y eliminar productos de la wishlist.
- **RF06:** El sistema debe permitir realizar pedidos.
- **RF07:** El sistema debe permitir visualizar pedidos realizados por el usuario.
- **RF08:** El sistema debe permitir dejar reseñas en productos comprados.
- **RF09:** El administrador debe poder crear, editar y eliminar productos.
- **RF10:** El administrador debe poder gestionar el estado de los pedidos.
- **RF11:** El sistema debe calcular automáticamente el total del pedido.
- **RF12:** El administrador debe poder crear, editar y eliminar categorías.

---

## 📌 Requisitos No Funcionales

- **RNF01:** La aplicación debe ser responsive.
- **RNF02:** El sistema debe responder en menos de 3 segundos en operaciones comunes.
- **RNF03:** Los errores deben mostrarse de forma clara al usuario.
- **RNF04:** El código debe estar documentado y organizado siguiendo el patrón MVC.
- **RNF05:** El sistema debe ser usable en dispositivos móviles.

## 📌 Casos de Uso

### 👤 Actores 
**Cliente:** Puede registrarse, iniciar sesión, navegar el catálogo, filtrar por categoría, gestionar su wishlist, realizar pedidos y dejar reseñas en productos comprados. 
**Administrador:** Puede iniciar sesión, navegar el catálogo, gestionar (CRUD) productos y categorías, y actualizar el estado de los pedidos. 

- **CU01:** Registrarse en el sistema
- **CU02:** Iniciar sesión
- **CU03:** Navegar y visualizar catálogo de productos
- **CU04:** Realizar un pedido
- **CU05:** Gestionar productos (Administrador)
- **CU06:** Gestionar categorías (Administrador)
- **CU07:** Dejar reseñas en productos
- **CU08:** Gestionar estado de pedidos (Administrador)
- **CU09:** Gestionar lista de deseos (Wishlist) 
