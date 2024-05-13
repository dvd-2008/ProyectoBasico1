<?php
include "Conexion.php";

$categoriaproducto = $_POST["categoria"];
$articuloproducto = $_POST["articulo"];
$descripcionproducto = $_POST["descripcion"];

// Obtener datos de la imagen
    $imagen = file_get_contents($_FILES["imagen"]["tmp_name"]);
    $imagen = addslashes($imagen);

$Sql = "INSERT INTO `gestiona` (categoria, articulo, descripcion, imagen) VALUES ('$categoriaproducto', '$articuloproducto', '$descripcionproducto', '$imagen')";
$resultado = $conexion->query($Sql);

if ($resultado) {
    header('Location: index.php');
} else {
    echo "No se insertaron los datos";
}
?>
