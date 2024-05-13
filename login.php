<?php
session_start();

// Verificar si hay un parámetro de error
$error = isset($_GET['error']) ? $_GET['error'] : null;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="styles.css">
    <style>
        /* Estilos para el fondo de la página */
        body {
            background-color: #343a40; /* Un tono de negro o gris oscuro */
            color: #fff; /* Color de texto blanco para contrastar */
        }

        /* Estilos para el contenedor del formulario de inicio de sesión */
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 40px;
            background-color: #343a40; /* Fondo del contenedor en negro o gris oscuro */
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.1); /* Sombra ligeramente blanca para resaltar */
        }

        .login-container h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #fff; /* Color de texto blanco */
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff; /* Fondo blanco para los campos de entrada */
            color: #333; /* Color de texto oscuro */
        }

        .login-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff; /* Botón azul */
            color: #fff; /* Texto blanco */
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .login-container input[type="submit"]:hover {
            background-color: #0056b3; /* Cambio de color al pasar el ratón */
        }

        .login-container p {
            margin-top: 20px;
            text-align: center;
        }

        .login-container a {
            color: #007bff; /* Color de enlace azul */
            text-decoration: none;
        }

        .login-container a:hover {
            text-decoration: underline; /* Subrayado al pasar el ratón */
        }
    </style>
</head>
<body>
    <br>
    <h1  class="text-center">Bienvenido a la empresa Tgestiona</h1>
    <div class="container">
        <div class="login-container">
            <h1>Iniciar Sesión</h1>
            <?php
            // Mostrar Sweet Alert si hay un error de credenciales
            if ($error == 1) {
                echo "<script>
                        Swal.fire({
                            title: 'Error',
                            text: 'Usuario y/o contraseña incorrectos. Inténtalo de nuevo.',
                            icon: 'error'
                        });
                     </script>";
            }
            ?>
            <form action="verificar_login.php" method="post">
                <input type="text" name="nombre" placeholder="Nombre de Usuario" required>
                <input type="password" name="contrasena" placeholder="Contraseña" required>
                <input type="submit" value="Acceder">
            </form>
            <p>¿No tienes una cuenta? <a href="registro.php">Regístrate aquí</a></p>
        </div>
    </div>
</body>
</html>
