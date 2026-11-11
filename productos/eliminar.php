<?php

if (!isset($_GET['id'])) exit();

$id = $_GET['id'];

include_once __DIR__ . '/../conexion.php';

$consulta = $cn->prepare("SELECT COUNT(*) FROM pedidos WHERE idProducto = ?;");
$consulta->execute([$id]);
$numPedidos = $consulta->fetchColumn();

if ($numPedidos > 0) {
    echo "No se puede eliminar este producto porque está en " . $numPedidos . " pedido(s).";
    echo "<br><br><a href='listar.php'>Volver al listado</a>";
    exit();
}

$consulta = $cn->prepare("DELETE FROM productos WHERE id = ?;");
$resultado = $consulta->execute([$id]);

if ($resultado === true) {
    echo "Producto eliminado correctamente";
} else {
    echo "Error!!!";
}

echo "<br><br><a href='listar.php'>Volver al listado</a>";