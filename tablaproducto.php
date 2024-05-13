<?php
include "Conexion.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Producto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweet.js"></script>
    <style>
        /* Estilos adicionales */
        .reloj {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <br>
    <center>
        <h1>Listado de Producto</h1>
    </center>
    <br>
    <div class="container">
        <a href="NuevoProducto.php" class="btn btn-dark">Agregar Producto</a>
        <hr>
        <table class="table productos-table">
            <!-- Contenido de la tabla de productos -->
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Articulo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $Sql = "SELECT * FROM gestiona";
                $resultado = $conexion->query($Sql);
                while ($Fila = $resultado->fetch_assoc()) { ?>
                    <tr>
                        <th scope="row"><?php echo $Fila['id']; ?></th>
                        <td><?php echo $Fila['categoria']; ?></td>
                        <td><?php echo $Fila['articulo']; ?></td>
                        <td><?php echo $Fila['descripcion']; ?></td>
                        <td><img style="width: 200px;" src="data:image/jpg;base64,<?php echo base64_encode($Fila['imagen']) ?>" alt=""></td>
                        <td>
                            <a href="Vista_Editar.php?id=<?php echo $Fila["id"] ?>" class="btn btn-warning">Editar</a>
                            <a href="EliminarProducto.php?id=<?php echo $Fila["id"] ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Integración del reloj -->
    <div class="reloj">
       
    </div>

</body>

</html>
