# Comed Todo

Proyecto de la asignatura de Desarrollo Web en Entorno Servidor (2º DAW).

Es una web para llevar los pedidos de una empresa de comida. Se pueden gestionar productos, direcciones, clientes, proveedores y pedidos.

## Qué tiene

- Productos: crear, listar, editar y eliminar.
- Direcciones: crear, listar, editar y eliminar.
- Clientes y proveedores: listado con AJAX y filtro por nombre y NIF. Los dos salen de la tabla entidad, según el campo esCliente.
- Pedidos: listado con AJAX y filtro por número, fecha, dirección y producto.

## Cómo ejecutarlo

1. Copiar la carpeta comedTodo en C:\xampp\htdocs
2. Arrancar Apache y MySQL desde XAMPP.
3. En phpMyAdmin crear la base de datos comedtodo e importar el archivo comedtodo.sql
4. Cambiar el usuario y la contraseña de MySQL en conexion.php si no son los mismos.
5. Abrir http://localhost/comedTodo/index.php en el navegador.

## Carpetas

- css: estilos de la web
- productos: CRUD de productos
- direcciones: CRUD de direcciones
- entidad: listados de clientes y proveedores
- pedidos: listado de pedidos
- conexion.php: conexión a la base de datos
- comedtodo.sql: la base de datos para importar
