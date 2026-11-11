<?php

require_once __DIR__ . '/../conexion.php';

$consulta = $cn->query("SELECT id, Nombre FROM direccion");
$direcciones = $consulta->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar productos</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>

    <h2>Crear nuevo producto</h2>

    <form action="guardarFormulario.php" method="post">

        <label for="nombre">Nombre: </label>
        <br>
        <input type="text" name="nombre" id="nombre" required>
        <br><br>
        <label for="idEntidad">Entidad:</label>
        <br>
        <select name="idEntidad" id="idEntidad" required>
            <option value="">-- Selecciona una entidad --</option>
            <?php foreach ($direcciones as $ent) { ?>
                <option value="<?php echo $ent->id ?>"><?php echo $ent->Nombre ?></option>
            <?php } ?>
        </select>
        <br><br>
        <label for="categoria">Categoria:</label>
        <br>
        <input type="text" name="categoria" id="categoria" required>
        <br><br>
        <label for="stock">Stock:</label>
        <br>
        <input type="number" name="stock" id="stock" required>
        <br><br>
        <label for="ingredientes">Ingredientes:</label>
        <br>
        <input type="text" name="ingredientes" id="ingredientes" required>
        <br><br>
        <input type="submit" value="Registrar">
    </form>
    <br><br>
    <a href="listar.php">Listar elementos</a>
</body>

</html>