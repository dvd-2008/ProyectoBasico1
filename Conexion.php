<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "tienda";
$port = "3315";

$conexion = new mysqli($server, $user, $pass, $db, $port);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
