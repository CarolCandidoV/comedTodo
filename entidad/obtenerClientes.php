<?php
require_once __DIR__ .'/../conexion.php';

$select = 'SELECT e.Nombre, e.Nif';
$from = ' FROM entidad e';
$where = ' WHERE e.esCliente = 1';
$parametros = [];

if (isset($_POST['nombre']) && $_POST['nombre'] != '') {
    $where .= " AND LOWER(e.Nombre) LIKE LOWER(?)";
    $parametros[] = $_POST['nombre'] . '%';
}

if (isset($_POST['nif']) && $_POST['nif'] != '') {
    $where .= " AND LOWER(e.Nif) LIKE LOWER(?)";
    $parametros[] = $_POST['nif'] . '%';
}

$sql = $select . $from . $where;
$consulta = $cn->prepare($sql);
$consulta->execute($parametros);
$clientes = $consulta->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($clientes);

?>