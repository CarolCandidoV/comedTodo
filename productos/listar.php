<?php

require_once __DIR__ . '/../conexion.php';

$consulta = $cn->query("SELECT * FROM productos");
$productos = $consulta->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla productos</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <h2>Listado de productos</h2>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Categoria</th>
                <th>Stock</th>
                <th>Ingredientes</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $prod) { ?>
                <tr>
                    <td><?php echo $prod->nombre ?></td>
                    <td><?php echo $prod->categoria ?></td>
                    <td><?php echo $prod->stock ?></td>
                    <td><?php echo $prod->ingredientes ?></td>
                    <td><a href="<?php echo "editar.php?id=" . $prod->id ?>">Editar</a></td>
                    <td><a href="<?php echo "eliminar.php?id=" . $prod->id ?>">Eliminar</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <br><br>
    <a href="formulario.php">Crear nuevo producto</a>
    <a href="../index.php">Volver al formulario</a>

</body>

</html>