  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

      <title>Nuevo Producto</title>
  </head>
  <body>
      <div class="container">
          <br>
          <h1>Nuevo Producto</h1>
          <br>
          <form action="AgregarProducto.php" method="POST" enctype="multipart/form-data">


  
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Categoria</label>
      <input type="text" class="form-control"name="categoria">
  
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">articulo</label>
      <input type="text" class="form-control" name="articulo">
    </div>

    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">descripcion</label>
      <input type="text" class="form-control" name="descripcion">
    </div>

    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">imagen</label>
      <input type="file" class="form-control" name="imagen">
    </div>
  
    <button type="submit" class="btn btn-primary">guardar</button>
    <a href="index.php" class="btn btn-info">regresar</a>
  </form>
  </div>
  </body>
  </html>