<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comed Todo</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>

    <h2>Listado pedidos</h2>

    <h3>Filtrado</h3>
    <form id="formulario">
        <label for="numero">Numero:</label>
        <input type="text" id="numero" name="numero">
        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha">
        <label for="direccion">Direccion:</label>
        <input type="text" id="direccion" name="direccion">
        <label for="producto">Producto:</label>
        <input type="text" id="producto" name="producto">
        <input type="button" value="Filtrar" onclick="listarPedidos();">
    </form>
    <br>

    <table id="tabla">
        <thead>
            <tr>
                <th>Numero del pedido</th>
                <th>Fecha</th>
                <th>Direccion</th>
                <th>Producto</th>
            </tr>
        </thead>
        <tbody id="cuerpo"></tbody>
    </table>

    <br><br>
    <a href="../index.php">Volver al menu</a>
    <script src="funcionesPedidos.js"></script>

</body>

</html>