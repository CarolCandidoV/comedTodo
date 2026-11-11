<?php

if (
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

$nombre = $_POST["nombre"];
$idEntidad = $_POST["idEntidad"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];
$mail = $_POST["mail"];
$contacto = $_POST["contacto"];
$poblacion = $_POST["poblacion"];
$provincia = $_POST["provincia"];
$cp = $_POST["cp"];

$consulta = $cn->prepare("INSERT INTO direccion(nombre, idEntidad, direccion, telefono, mail, contacto, poblacion, provincia, cp) VALUES (?,?,?,?,?,?,?,?,?);");
$resultado = $consulta->execute([$nombre, $idEntidad, $direccion, $telefono, $mail, $contacto, $poblacion, $provincia, $cp]);

if ($resultado === true) {
    echo "Insertado correctamente";
} else {
    echo "Error!!!";
}

echo "<br><br><a href='listar.php'>Listar</a>";

?>