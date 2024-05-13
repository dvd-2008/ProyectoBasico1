<?php
// Verificar si se recibió un ID de usuario para eliminar
if (isset($_GET['usuario_id'])) {
    // Obtener el ID del usuario a eliminar
    $usuario_id = $_GET['usuario_id'];

    // Incluir el archivo de conexión a la base de datos
    include "Conexion.php";

    // Consulta para eliminar el usuario con el ID proporcionado
    $sql = "DELETE FROM usuarios WHERE usu_id = $usuario_id";

    if ($conexion->query($sql) === TRUE) {
        // Redireccionar de vuelta al listado de usuarios con un mensaje de éxito
        session_start();
        $_SESSION['changes_saved'] = true;
        header("Location: usuarios.php");
        exit();
    } else {
        // Si ocurre un error al eliminar, mostrar un mensaje de error
        echo "Error al eliminar usuario: " . $conexion->error;
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
} else {
    // Si no se recibió un ID de usuario válido, redireccionar al listado de usuarios
    header("Location: usuarios.php");
    exit();
}
?>
