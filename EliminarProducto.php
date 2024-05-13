<?php
include('Conexion.php');

$Id = $_GET['id'];
$sql= "DELETE FROM gestiona WHERE id = $Id";
$resultado = $conexion->query($sql);
if ($resultado) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "error"));
}
?>
