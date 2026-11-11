<?php

$bbdd = 'comedtodo';
$username = 'root';
$password = 'tood';

try {
    $cn = new PDO('mysql:host=localhost;dbname=' . $bbdd . ';charset=utf8mb4', $username, $password);
} catch (PDOException $pdoe) {
    echo "Error al conectar con la base de datos: " . $pdoe->getMessage();
}
