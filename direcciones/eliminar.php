<?php 

if(!isset($_GET["id"])) exit();
$idDireccion = $_GET["id"];

include_once __DIR__ .'/../conexion.php';

// Comprobamos si la dirección está en algún pedido
$consulta = $cn->prepare("SELECT COUNT(*) FROM pedidos WHERE idDireccion = ?;");
$consulta->execute([$idDireccion]);
$numPedidos = $consulta->fetchColumn();

if ($numPedidos > 0) {
    echo "No se puede eliminar esta dirección porque está en " . $numPedidos . " pedido(s).";
    echo "<br><br><a href='listar.php'>Volver al listado</a>";
    exit();
}

$consulta = $cn->prepare("DELETE FROM direccion WHERE id = ?;");
$resultado = $consulta->execute([$idDireccion]);

if($resultado === true){
    echo "Eliminado correctamente";
    echo "<br><br><a href='listar.php'>Volver al listado</a>";
}else{
    echo "Error!!!";
}

?>