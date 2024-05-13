<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* Estilos para el fondo de la página */
        body {
            background-color: #131921; /* Fondo azulado tirando a negro */
            color: #fff; /* Color de texto blanco para contrastar */
        }

        /* Estilos para el contenedor del formulario de registro */
        .register-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 40px;
            background-color: #1f2933; /* Fondo azulado más oscuro */
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.1); /* Sombra ligeramente blanca para resaltar */
        }

        .register-container h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #fff; /* Color de texto blanco */
        }

        .register-container input[type="text"],
        .register-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff; /* Fondo blanco para los campos de entrada */
            color: #333; /* Color de texto oscuro */
        }

        .register-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff; /* Botón azul */
            color: #fff; /* Texto blanco */
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .register-container input[type="submit"]:hover {
            background-color: #0056b3; /* Cambio de color al pasar el ratón */
        }

        .register-container p {
            margin-top: 20px;
            text-align: center;
        }

        .register-container a {
            color: #007bff; /* Color de enlace azul */
            text-decoration: none;
        }

        .register-container a:hover {
            text-decoration: underline; /* Subrayado al pasar el ratón */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="register-container">
            <h1>Registrarse</h1>
            <form action="" method="post">
                <input type="text" name="nombre" placeholder="Nombre de Usuario" required>
                <input type="password" name="contrasena" placeholder="Contraseña" required>
                <input type="submit" value="Registrarse">
            </form>
            <p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a></p>
        </div>
    </div>

    <?php
    // Verificar si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
                    }).then(() => {
                        window.location.href = 'login.php'; // Redirigir al usuario a la página de inicio de sesión
                    });
                </script>";
        } else {
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error al registrar el usuario.'
                    });
                </script>";
        }
    }
    ?>
</body>
</html>
