<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comed Todo - Proveedores</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>

    <h2>Listado de proveedores</h2>

    <h3>Filtrado</h3>
    <form id="formulario">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">
        <label for="nif">NIF:</label>
        <input type="text" id="nif" name="nif">
        <input type="button" value="Filtrar" onclick="listarProveedores();">
    </form>
    <br>

    <table id="tabla">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>NIF</th>
            </tr>
        </thead>
        <tbody id="cuerpo"></tbody>
    </table>

    <br><br>
    <a href="../index.php">Volver al menu</a>
    <script src="funcionesProveedores.js"></script>

</body>

</html>