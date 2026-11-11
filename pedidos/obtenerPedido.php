<?php
require_once __DIR__ . '/../conexion.php';

$select = 'SELECT p.numero, p.fecha, d.nombre AS direccion, pr.nombre AS producto';
$from = ' FROM pedidos p
        JOIN direccion d ON p.idDireccion = d.id
        JOIN productos pr ON p.idProducto = pr.id';
$where = ' WHERE TRUE';
$parametros = [];

if (isset($_POST['numero']) && $_POST['numero'] != '') {
        $where .= " AND p.numero LIKE ?";
        $parametros[] = $_POST['numero'] . '%';
}

if (isset($_POST['fecha']) && $_POST['fecha'] != '') {
        $where .= " AND p.fecha = ?";
        $parametros[] = $_POST['fecha'];
}

if (isset($_POST['direccion']) && $_POST['direccion'] != '') {
        $where .= " AND LOWER(d.nombre) LIKE LOWER(?)";
        $parametros[] = $_POST['direccion'] . '%';
}

if (isset($_POST['producto']) && $_POST['producto'] != '') {
        $where .= " AND LOWER(pr.nombre) LIKE LOWER(?)";
        $parametros[] = $_POST['producto'] . '%';
}

$sql = $select . $from . $where;
$consulta = $cn->prepare($sql);
$consulta->execute($parametros);
$pedidos = $consulta->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($pedidos);
