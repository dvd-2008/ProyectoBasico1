<?php
include('Conexion.php');

$id = $_REQUEST['IdEditar'];
$categoria = $_POST['CategoriaProducto'];
$articulo = $_POST['ArticuloProducto'];
$descripcion = $_POST['DescripcionProducto'];

// Verificar si se ha enviado un archivo de imagen
if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] == UPLOAD_ERR_OK) {
    // Si se ha enviado un nuevo archivo de imagen, actualizarla
    $imagen = file_get_contents($_FILES["imagen"]["tmp_name"]);
    $imagen = addslashes($imagen);
    $sql = "UPDATE gestiona SET
            categoria = '$categoria',
            articulo = '$articulo',
            descripcion = '$descripcion',
            imagen = '$imagen' 
            WHERE id = $id";
} else {
    // Si no se ha enviado un nuevo archivo de imagen, mantener la imagen existente
    $sql = "UPDATE gestiona SET
            categoria = '$categoria',
            articulo = '$articulo',
            descripcion = '$descripcion'
            WHERE id = $id";
}

$resultado = $conexion->query($sql);

if ($resultado) {
    header('Location: index.php');
} else {
    echo "No se actualizó los datos";
}
?>
