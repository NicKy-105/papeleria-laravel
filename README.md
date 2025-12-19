# Examen - Desarrollo en Plataformas

**Estudiante:** Doménica Arcos  
**Fecha:** 19 de diciembre de 2024  
**Paralelo:** 2

---

## Mis Decisiones de Diseño

### 1. Tabla

**Nombre de la tabla:** `pedidos`

**Campos:**

| Campo | Tipo | Obligatorio | Descripción |
|-------|------|-------------|-------------|
| id | BIGINT | Sí (auto) | Identificador único autogenerado |
| producto | VARCHAR(100) | Sí | Nombre del producto solicitado |
| nomCliente | VARCHAR(100) | Sí | Nombre del cliente |
| telefono | VARCHAR(10) | Sí | Teléfono de contacto (exactamente 10 dígitos numéricos) |
| estado | VARCHAR(50) | Sí | Estado actual del pedido |
| fechaPedido | DATETIME | Sí (auto) | Fecha y hora del pedido (se genera automáticamente) |
| created_at | TIMESTAMP | Sí (auto) | Fecha de creación del registro (automática) |
| updated_at | TIMESTAMP | Sí (auto) | Fecha de última modificación (automática) |
| deleted_at | TIMESTAMP | No | Fecha de eliminación lógica (null si no está eliminado) |

---

### 2. Estados del Pedido

1. **Solicitado al proveedor** - Pedido enviado al proveedor
2. **Producto llegó** - Producto disponible en tienda
3. **Cliente avisado** - Se notificó al cliente
4. **Pedido entregado** - Cliente recogió el producto

---

### 3. ¿Se puede eliminar registros?

**Respuesta:** Sí, pero con eliminación lógica (soft delete)

**Razón:** El usuario debería de poder eliminar su registro si el pedido fue entregado y asi lo desea, pero no se borra fisicamente debido a que el cliente puede decir que en realidad no le entregaron su pedido, con el eliminado lógico nos aseguramos de tener todos los registros por prevención.

- **Validaciones**
    - Nombre del cliente: solo letras, tildes, ñ y espacios
    - Teléfono: exactamente 10 dígitos numéricos
    - Todos los campos obligatorios
    - Mensajes de error personalizados en español



**Link:** https://github.com/NicKy-105/papeleria-laravel.git
