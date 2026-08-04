# 📦 Documentación de Modelos Eloquent

Cada tabla posee un modelo Laravel asociado, encargado de representar la entidad dentro de la aplicación. 

Los modelos implementan: 

- Relaciones Eloquent. 
- Validación de asignación masiva mediante `$fillable`.
- Conversión automática de tipos mediante casts. 
- Métodos auxiliares para lógica específica. 

---

### 👤 Usuario 

**Relaciones:** 
- `hasMany(Order::class)`
- `hasMany(Review::class)`
- `hasMany(Address::class)`
- `belongsToMany(Product::class)` *(vía wishlist)*

**Un usuario puede tener:** 
- Muchos pedidos. 
- Muchas reseñas. 
- Muchas direcciones. 
- Muchos productos favoritos. 

---

### 🛍️ Product

**Relaciones:** 
- `belongsToMany(Category::class)`
- `hasMany(OrderItem::class)`
- `hasMany(Review::class)`
- `belongsToMany(Usuario::class)` *(vía wishlists)*

**Un producto puede tener:**
- Muchas categorías asignadas.
- Muchas apariciones en detalles de pedidos (OrderItems).
- Muchas reseñas de clientes.
- Muchos usuarios que lo han marcado como favorito.

---

### 🏷️ Category

**Relaciones:** 
- `belongsToMany(Product::class)`

**Una categoría puede tener:**
- Muchos productos asociados en el catálogo.

---

### 🛒 Order

**Relaciones:** 
- `belongsTo(Usuario::class)`
- `hasMany(OrderItem::class)`

**Un pedido puede tener:**
- Un único usuario comprador (dueño del pedido).
- Muchos ítems que componen el detalle de la compra.

---

### 📝 OrderItem

**Relaciones:** 
- `belongsTo(Order::class)`
- `belongsTo(Product::class)`

**Un detalle de pedido (ítem) puede tener:**
- Una única orden a la que pertenece.
- Un único producto asociado.

---

### ⭐ Review

**Relaciones:** 
- `belongsTo(Usuario::class)`
- `belongsTo(Product::class)`

**Una reseña puede tener:**
- Un único usuario que la escribió.
- Un único producto al que está calificando.

---

### 📍 Address

**Relaciones:** 
- `belongsTo(Usuario::class)`

**Una dirección física puede tener:**
- Un único usuario al que le pertenece (dueño de la libreta de direcciones).
