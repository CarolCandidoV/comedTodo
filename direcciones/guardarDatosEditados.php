<?php

if (
    !isset($_POST["id"]) ||
    !isset($_POST["nombre"]) ||
    !isset($_POST["idEntidad"]) ||
    !isset($_POST["direccion"]) ||
    !isset($_POST["telefono"]) ||
    !isset($_POST["mail"]) ||
    !isset($_POST["contacto"]) ||
    !isset($_POST["poblacion"]) ||
    !isset($_POST["provincia"]) ||
    !isset($_POST["cp"])
) exit();

include_once __DIR__ . '/../conexion.php';

$id = $_POST["id"];
$nombre = $_POST["nombre"];
$idEntidad = $_POST["idEntidad"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];
$mail = $_POST["mail"];
$contacto = $_POST["contacto"];
$poblacion = $_POST["poblacion"];
$provincia = $_POST["provincia"];
$cp = $_POST["cp"];

$consulta = $cn->prepare("UPDATE direccion SET nombre = ?, idEntidad = ?, direccion = ?, telefono = ?, mail = ?, contacto = ?, poblacion = ?, provincia = ?, cp = ? WHERE id = ?;");

$resultado = $consulta->execute([$nombre, $idEntidad, $direccion, $telefono, $mail, $contacto, $poblacion, $provincia, $cp, $id]);

if ($resultado === true) {
    echo "Cambios guardados";
    echo "<br><br><a href='listar.php'>Volver al listado</a>";
} else {
    echo "Error!!!";
}
