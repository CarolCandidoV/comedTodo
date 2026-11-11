<?php

require_once __DIR__ . '/../conexion.php';

$consulta = $cn->query("SELECT * FROM direccion");
$direcciones = $consulta->fetchAll(PDO::FETCH_OBJ);

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
                <th>Email</th>
                <th>Direccion</th>
                <th>Poblacion</th>
                <th>Provincia</th>
                <th>Codigo Postal</th>
                <th>Telefono</th>
                <th>Contacto</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($direcciones as $dir) { ?>
                <tr>
                    <td><?php echo $dir->nombre ?></td>
                    <td><?php echo $dir->mail ?></td>
                    <td><?php echo $dir->direccion ?></td>
                    <td><?php echo $dir->poblacion ?></td>
                    <td><?php echo $dir->provincia ?></td>
                    <td><?php echo $dir->cp ?></td>
                    <td><?php echo $dir->telefono ?></td>
                    <td><?php echo $dir->contacto ?></td>
                    <td><a href="<?php echo "editar.php?id=" . $dir->id ?>">Editar</a></td>
                    <td><a href="<?php echo "eliminar.php?id=" . $dir->id ?>">Eliminar</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <br><br>
    <a href="../index.php">Volver al menu</a>

</body>

</html>