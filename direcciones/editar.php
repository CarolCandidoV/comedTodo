<?php

if (!isset($_GET['id'])) exit();

$idDireccion = $_GET['id'];

include_once __DIR__ . '/../conexion.php';

$consulta = $cn->prepare("SELECT * FROM direccion WHERE id = ?;");
$consulta->execute([$idDireccion]);
$direccion = $consulta->fetch(PDO::FETCH_OBJ);

if ($direccion === false) {
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

        <input type="hidden" name="id" value="<?php echo $direccion->id; ?>">

        <label for="nombre">Nombre: </label>
        <br>
        <input value="<?php echo $direccion->nombre ?>" name="nombre" type="text" id="nombre" required>
        <br><br>
        <label for="idEntidad">Entidad:</label>
        <br>
        <select name="idEntidad" id="idEntidad" required>
            <option value="">-- Selecciona una entidad --</option>
            <?php foreach ($entidades as $ent) { ?>
                <option value="<?php echo $ent->id ?>" <?php if ($ent->id == $direccion->idEntidad) echo "selected"; ?>>
                    <?php echo $ent->Nombre ?>
                </option>
            <?php } ?>
        </select>
        <br><br>
        <label for="direccion">Direccion: </label>
        <br>
        <input value="<?php echo $direccion->direccion ?>" name="direccion" type="text" id="direccion" required>
        <br><br>
        <label for="telefono">Telefono: </label>
        <br>
        <input value="<?php echo $direccion->telefono ?>" name="telefono" type="tel" id="telefono" required>
        <br><br>
        <label for="mail">Email: </label>
        <br>
        <input value="<?php echo $direccion->mail ?>" name="mail" type="email" id="mail" required>
        <br><br>
        <label for="contacto">Contacto: </label>
        <br>
        <input value="<?php echo $direccion->contacto ?>" name="contacto" type="text" id="contacto" required>
        <br><br>
        <label for="poblacion">Poblacion: </label>
        <br>
        <input value="<?php echo $direccion->poblacion ?>" name="poblacion" type="text" id="poblacion" required>
        <br><br>
        <label for="provincia">Provincia: </label>
        <br>
        <input value="<?php echo $direccion->provincia ?>" name="provincia" type="text" id="provincia" required>
        <br><br>
        <label for="cp">Codigo Postal: </label>
        <br>
        <input value="<?php echo $direccion->cp ?>" name="cp" type="text" id="cp" required>
        <br><br>
        <input type="submit" value="Guardar cambios">
    </form>


</body>

</html>