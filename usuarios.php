<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Font Awesome para los iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-J6wHKR7mj2b7QoyBxavLEJQtJWNQQ7kDWL/3r6dO8vuaGbNtvTV9BGrVXbsqUe2s8PbW8kK1Tw0n/brMWZ5gTg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <div class="main-content">
            <div class="container">
                <br>
                <center>
                    <h1>Listado de Usuarios</h1>
                </center>
                <br>
                <div class="container">
                    <table class="table table-striped rounded-table">
                        <!-- Encabezados de la tabla -->
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Contraseña</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            session_start();

                            // Verificar si el usuario ha iniciado sesión
                            if (!isset($_SESSION['usu_nom'])) {
                                header("Location: login.php");
                                exit;
                            }

                            // Incluir el archivo de conexión a la base de datos
                            include "Conexion.php";

                            // Consulta a la base de datos para obtener la lista de usuarios
                            $sql = "SELECT * FROM usuarios";
                            $resultado = $conexion->query($sql);

                            // Verificar si se encontraron resultados
                            if ($resultado->num_rows > 0) {
                                // Mostrar los datos en la tabla
                                while ($fila = $resultado->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<th scope='row'>" . $fila['usu_id'] . "</th>";
                                    echo "<td>" . $fila['usu_nom'] . "</td>";
                                    echo "<td>" . hidePassword($fila['usu_pass']) . "</td>";
                                    // Botones de editar y eliminar con modal
                                    echo "<td>";
                                    echo "<button type='button' class='btn btn-primary btn-sm' onclick='abrirModalEditar(" . $fila['usu_id'] . ", \"" . $fila['usu_nom'] . "\", \"" . $fila['usu_pass'] . "\")'>Editar</button> ";
                                    echo "<button type='button' class='btn btn-danger btn-sm' onclick='eliminarUsuario(" . $fila['usu_id'] . ")'>Eliminar</button>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                // Si no se encontraron usuarios
                                echo "<tr><td colspan='4'>No se encontraron usuarios.</td></tr>";
                            }

                            function hidePassword($password) {
                                return str_repeat("*", strlen($password));
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Botón de menú -->
    <div class="container mt-3">
        <button type="button" class="btn btn-primary" onclick="window.location.href='index.php'">MENU</button>
    </div>

    <!-- Modal de edición de usuario -->
    <div class="modal fade" id="modalEditarUsuario" tabindex="-1" aria-labelledby="modalEditarUsuarioLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarUsuarioLabel">Editar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formEditarUsuario" action="editar_usuario.php" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="usuario_id" id="usuario_id">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre de usuario:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="contrasena" class="form-label">Contraseña:</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword"><i class="fas fa-eye"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts de Bootstrap y JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Función para mostrar u ocultar la contraseña
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#contrasena');
        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
        });

        // Función para abrir el modal de edición de usuario
        function abrirModalEditar(usuario_id, nombreUsuario, contrasenaUsuario) {
            document.getElementById("usuario_id").value = usuario_id;
            document.getElementById("nombre").value = nombreUsuario;
            document.getElementById("contrasena").value = contrasenaUsuario;

            var modal = new bootstrap.Modal(document.getElementById('modalEditarUsuario'));
            modal.show();
        }

        // Función para eliminar usuario
        function eliminarUsuario(usuario_id) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminarlo!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Aquí puedes hacer una solicitud AJAX para eliminar el usuario con el ID proporcionado
                    // Por simplicidad, aquí simplemente redirigimos a una página de eliminación de usuario
                    window.location.href = 'eliminar_usuario.php?usuario_id=' + usuario_id;
                }
            });
        }
    </script>

<script>
<?php
if (isset($_SESSION['changes_saved']) && $_SESSION['changes_saved']) {
    unset($_SESSION['changes_saved']); // Elimina la variable de sesión
?>
    Swal.fire({
        icon: 'success',
        title: '¡Éxito!',
        text: 'Los cambios se han guardado satisfactoriamente.',
        showConfirmButton: false,
        timer: 1500
    });
<?php
}
?>
</script>
</body>
</html>
