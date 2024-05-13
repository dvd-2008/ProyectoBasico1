<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Modificar Producto</title>
</head>

<body> <?php
        include "Conexion.php";
        $id=$_REQUEST['id'];
        $Sql = "SELECT * FROM gestiona where id = $id";
        $resultado = $conexion->query($Sql);
        $Fila = $resultado-> fetch_assoc();

        ?>

    <div class="container">
        <br>
    <center>
        <h1>Modificar Prodcuto  </h1>
    </center>


    <form action="EditarProducto.php?IdEditar=<?php echo $Fila["id"]?>" method="POST"  enctype="multipart/form-data">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Categoria</label>
    <input type="text" class="form-control" name="CategoriaProducto" value="<?php echo $Fila["categoria"]?>">
   
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Articulo</label>
    <input type="text" class="form-control" name="ArticuloProducto" value="<?php echo $Fila["articulo"]?>">
   
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Descripcion </label>
    <input type="text" class="form-control" name="DescripcionProducto" value="<?php echo $Fila["descripcion"]?>">
   
  </div>
  <td><img style="width: 200px;" src="data:image/jpg;base64,<?php echo base64_encode($Fila['imagen'])?>" alt=""></td>
                          
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Imagen</label>
    <input type="file" class="form-control" name="imagen">

   
  </div>

  <button type="submit" class="btn btn-primary">enviar</button>
  <a href="index.php" class="btn btn-info">regresar </a>
</form>

    </div>


</body>

</html>