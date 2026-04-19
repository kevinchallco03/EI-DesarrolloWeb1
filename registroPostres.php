<?php 
    require_once('./controladores/funciones.php');
    $bd = conexion('localhost','panaderia','root','');

    $name = '';
    $descripcion = '';
    $price = '';
    $discount = '';

    if ($_POST){
        $name = $_POST['name'];
        $descripcion = $_POST['descripcion'];
        $price = $_POST['price'];
        $discount = $_POST['discount'];
        $imagen = armarImagen($_FILES);

        registrarPlato($bd, 'desserts', $_POST, $imagen);
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <?php require_once('./partials/barraNavegacion.php') ?>
<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
  <div class="card shadow-lg p-4" style="width: 30rem; border-radius: 15px;">
    <h2 class="text-center mb-4" style="color: #0e144bff;">Registrar un Postre</h2>
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="md-3">
        <label for="validationCustom01" class="form-label">Nombre del postre</label>
        <input type="text" class="form-control" name="name" required>
        <div class="valid-feedback">Looks good!</div>
      </div>

      <div class="md-3">
        <label for="validationCustom01" class="form-label">Descripción</label>
        <input type="text" class="form-control" name="descripcion" required>
        <div class="valid-feedback">Looks good!</div>
      </div>

      <div class="mb-3">
        <label class="form-label">Precio</label>
        <input type="number" class="form-control" name="price" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Descuento</label>
        <input type="number" class="form-control" name="discount" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Imagen</label>
        <input type="file" class="form-control" name="imagen" aria-label="file example" required>
        <div class="invalid-feedback">Example invalid form file feedback</div>
      </div>

      <button class="btn w-100" style="background-color:#0e144bff; color:white;">Registrar postre</button>
    </form>
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
