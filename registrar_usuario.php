<?php
include "Conexion.php";

$nombre = $_POST["nombre"];
$contrasena = $_POST["contrasena"];

$sql = "INSERT INTO `usuarios` (usu_nom, usu_pass) VALUES ('$nombre', '$contrasena')";
$resultado = $conexion->query($sql);

if ($resultado) {
    echo "<script>
            Swal.fire({
                icon: 'success',
                title: '¡Usuario registrado correctamente!',
                showConfirmButton: false,
                timer: 1500
            }).then((result) => {
                window.location.href = 'login.php'; // Redirigir al usuario a la página de inicio de sesión
            });
          </script>";
} else {
    echo "Error al registrar el usuario.";
}
?>
