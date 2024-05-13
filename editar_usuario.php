<?php
session_start();

// Verificar si se ha enviado un ID de usuario válido a través del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['usuario_id'])) {
    // Obtener el ID del usuario y los datos actualizados del formulario
    $usuario_id = $_POST['usuario_id'];
    $nombre = $_POST['nombre'];
    $contrasena = $_POST['contrasena'];

    // Incluir el archivo de conexión a la base de datos
    include "Conexion.php";

    // Preparar la consulta SQL para actualizar los datos del usuario
    $sql = "UPDATE usuarios SET usu_nom=?, usu_pass=? WHERE usu_id=?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssi", $nombre, $contrasena, $usuario_id);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Cerrar la conexión y liberar los recursos
        $stmt->close();
        $conexion->close();

        // Establecer una variable de sesión para indicar que los cambios se guardaron correctamente
        $_SESSION['changes_saved'] = true;

        // Redirigir a la página de usuarios
        header("Location: usuarios.php");
        exit;
    } else {
        // Mostrar un mensaje de error si la actualización falló
        echo "Error al actualizar el usuario: " . $conexion->error;
    }
} else {
    // Si no se ha enviado un ID de usuario válido, redirigir a la página de usuarios
    header("Location: usuarios.php");
    exit;
}
?>
