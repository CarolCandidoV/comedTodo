<?php

if (!isset($_GET['id'])) exit();

$idProductos = $_GET['id'];

include_once __DIR__ .'/../conexion.php';

$consulta = $cn->prepare("SELECT * FROM productos WHERE id = ?;");
$consulta->execute([$idProductos]);
$productos = $consulta->fetch(PDO::FETCH_OBJ);

if ($productos === false) {
    echo "No existe ningún producto con este id";
    exit();
}

$consultaEntidades = $cn->query("SELECT id, Nombre FROM entidad");
$entidades = $consultaEntidades->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar producto</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>

    <h2>Edición de productos</h2>

    <form action="guardarDatosEditados.php" method="post">

        <input type="hidden" name="id" value="<?php echo $productos->id; ?>">

        <label for="nombre">Nombre: </label>
        <br>
        <input value="<?php echo $productos->nombre ?>" name="nombre" type="text" id="nombre" required>
        <br><br>
        <label for="idEntidad">Entidad:</label>
        <br>
        <select name="idEntidad" id="idEntidad" required>
            <option value="">-- Selecciona una entidad --</option>
            <?php foreach ($entidades as $ent) { ?>
                <option value="<?php echo $ent->id ?>" <?php if ($ent->id == $productos->idEntidad) echo "selected"; ?>>
                    <?php echo $ent->Nombre ?>
                </option>
            <?php } ?>
        </select>
        <br><br>
        <label for="categoria">Categoria: </label>
        <br>
        <input value="<?php echo $productos->categoria ?>" name="categoria" type="text" id="categoria" required>
        <br><br>
        <label for="stock">Stock: </label>
        <br>
        <input value="<?php echo $productos->stock ?>" name="stock" type="number" id="stock" required>
        <br><br>
        <label for="ingredientes">Ingredientes: </label>
        <br>
        <input value="<?php echo $productos->ingredientes ?>" name="ingredientes" type="text" id="ingredientes" required>
        <br><br>
        <input type="submit" value="Guardar cambios">
    </form>


</body>

</html>