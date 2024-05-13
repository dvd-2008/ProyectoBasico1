<?php
session_start();

// Definir $usu_nom con un valor predeterminado
$usu_nom = isset($_SESSION['usu_nom']) ? $_SESSION['usu_nom'] : "Usuario";

// Verificar si hay una sesión activa y obtener el nombre de usuario si está definido
if (!isset($_SESSION['usu_nom'])) {
    // Si no hay una sesión activa, redirigir a login.php
    header("Location: login.php");
    exit;
} else {
    // Mostrar el SweetAlert de bienvenida solo si es la primera vez que se inicia sesión
    if (!isset($_SESSION['welcome_alert_shown'])) {
        $_SESSION['welcome_alert_shown'] = true;
        echo "
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: '¡Bienvenido!',
                        text: 'Bienvenido al sistema, $usu_nom!',
                        icon: 'success'
                    });
                });
            </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entregable</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
   
    <script src="sweet.js"></script>
<!-- Incluir el archivo sweet.js -->
    <style>
        /* Estilos adicionales */
        .sidebar {
            height: 100%;
            width: 200px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: black;
            padding-top: 20px;
        }

        .sidebar a {
            padding: 10px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
        }

        /* Estilos para el contenido principal */
        .main-content {
            margin-left: 220px; /* Ajustar el margen izquierdo */
            padding: 20px;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column align-items-center">
        <li style="list-style: none; padding-bottom: 20px;">
            <img src="logo.jpg" alt="logotipo" style="width: 100px; border-radius: 50%;">
        </li>

        <div style="text-align: center; color: #fff; margin-top: 20px;">
            <h4>Bienvenido, <?php echo strtoupper($usu_nom); ?></h4>
        </div>

        <a href="#" class="active"><ion-icon name="bag-outline"></ion-icon> Productos</a>
        <a href="usuarios.php"><ion-icon name="person-outline"></ion-icon> Usuarios</a>

      

        <a href="#"> <ion-icon name="cube-outline"></ion-icon> Compras</a>
        <a href="#"><ion-icon name="server-outline"></ion-icon> Ventas</a>
        <a href="#"><ion-icon name="alert-circle-outline"></ion-icon> Seguridad</a>
        <a href="#"><ion-icon name="chatbox-ellipses-outline"></ion-icon> Acerca de</a>
        <a href="logout.php" id="logoutBtn"><ion-icon name="log-out-outline"></ion-icon> Cerrar Sesión</a>
    </div>

    <!-- Contenido principal -->
   <!-- Contenido principal -->
   <?php include "fecha.php"?>
    <div class="main-content d-flex flex-column align-items-center justify-content-center">
        <h1 style="background-color: black; color: white; padding: 10px; border-radius: 10px;">Bienvenido a la empresa "TGestiona"</h1> 
        <br><br>
        <p class="ml-auto"><strong> Peru </strong> <?php echo fecha();?></p>
            <div class="reloj">
                
            </div>
        <div>
        
        </div>
        <img src="tgestiona.jpg" alt="logotipo" style="width: 500px; border-radius: 10px;">
    </div>

</body>

</html>
