<?php 

if(!isset($_POST["nombre"]) || 
    !isset($_POST["idEntidad"]) || 
    !isset($_POST["categoria"]) ||
    !isset($_POST["stock"]) ||
    !isset($_POST["ingredientes"])) exit();

include_once __DIR__ .'/../conexion.php';

$nombre = $_POST["nombre"];
$idEntidad = $_POST["idEntidad"];
$categoria = $_POST["categoria"];
$stock = $_POST["stock"];
$ingredientes = $_POST["ingredientes"];

$consulta = $cn->prepare("INSERT INTO productos(nombre, idEntidad, categoria, stock, ingredientes) VALUES (?,?,?,?,?);");
$resultado = $consulta->execute([$nombre, $idEntidad, $categoria, $stock, $ingredientes]);

if($resultado === true){
    echo "Cambios guardados";
    echo "<br><br><a href='listar.php'>Volver al listado</a>";
}else{
    echo "Error!!!";
}

?>