<?php
session_start();
include "Conexion.php";

$nombre = $_POST["nombre"];
$contrasena = $_POST["contrasena"];

$sql = "SELECT * FROM `usuarios` WHERE `usu_nom`='$nombre' AND `usu_pass`='$contrasena'";
$resultado = $conexion->query($sql);

if ($resultado->num_rows == 1) {
    // Establecer la sesión con el nombre de usuario
    $_SESSION["usu_nom"] = $nombre;
    
    // Redirigir al usuario a index.php
    header("Location: index.php");
    exit;
} else {
    // Redirigir al usuario a login.php con un parámetro de error
    header("Location: login.php?error=1");
    exit;
}
?>
