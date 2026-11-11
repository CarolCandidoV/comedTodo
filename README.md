\# Comed Todo



Proyecto de Desarrollo Web en Entorno Servidor (2º DAW).

Gestión de productos, direcciones, clientes, proveedores y pedidos de una empresa de comida.



\- \*\*Productos y Direcciones:\*\* CRUD (crear, listar, editar, eliminar).

\- \*\*Clientes, Proveedores y Pedidos:\*\* listados con AJAX (jQuery) y filtrado.



\## Requisitos



\- XAMPP (Apache + MySQL)

\- Navegador web



\## Cómo ejecutarlo



1\. Copia la carpeta `comedTodo` dentro de `C:\\xampp\\htdocs\\`.

2\. Abre el panel de XAMPP y arranca \*\*Apache\*\* y \*\*MySQL\*\*.

3\. Entra en `http://localhost/phpmyadmin`, crea una base de datos llamada `comedtodo`

&#x20;  e importa el archivo `comedtodo.sql`.

4\. Revisa `conexion.php` y pon tu usuario y contraseña de MySQL:

&#x20;  ```php

&#x20;  $username = 'root';

&#x20;  $password = 'tu\_contraseña';

&#x20;  ```

5\. Abre en el navegador: `http://localhost/comedTodo/index.php`



\## Estructura



```

comedTodo/

├── css/            → estilos.css (estilos comunes)

├── direcciones/    → CRUD de direcciones

├── entidad/        → listados AJAX de clientes y proveedores

├── pedidos/        → listado AJAX de pedidos

├── productos/      → CRUD de productos

├── conexion.php    → conexión PDO a MySQL

├── comedtodo.sql   → base de datos

└── index.php       → menú principal

```

