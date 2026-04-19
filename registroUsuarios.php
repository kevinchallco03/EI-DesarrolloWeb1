<?php 
    require_once('./controladores/funciones.php');
    $bd = conexion('localhost','panaderia','root','');

    $nombre = '';
    $apellido = '';
    $email = '';
    $contrasena = '';
    $confirmacion = '';
    $errores = [];
    if ($_POST){

        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $contrasena = $_POST['contrasena'];
        $confirmacion = $_POST['confirmacion'];

        $errores = validarRegistroUsuario($_POST);
        
        if (count($errores)===0){
            $imagen = armarImagen($_FILES);
            registrarUsuario($bd, 'users', $_POST, $imagen);
        }
        
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
    <h2 class="text-center mb-4" style="color: #0e144bff;">Registrarse</h2>
        <?php  
              if(count($errores) > 0):?>
                  <ul class="alert alert-danger">
                       <?php 
                           foreach ($errores as $key => $error) :?>
                            <li><?= $error?></li>
                       <?php endforeach;?>
                </ul>
         <?php endif;?>
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="md-3">
        <label for="validationCustom01" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="nombre" required>
        <div class="valid-feedback">Looks good!</div>
      </div>

      <div class="md-3">
        <label for="validationCustom01" class="form-label">Apellido</label>
        <input type="text" class="form-control" name="apellido" required>
        <div class="valid-feedback">Looks good!</div>
      </div>

      <div class="mb-3">
        <label class="form-label">Correo Electrónico</label>
        <input type="email" class="form-control" name="email" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Contraseña</label>
        <input type="password" class="form-control" name="contrasena" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Confirmar Contraseña</label>
        <input type="password" class="form-control" name="confirmacion" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Imagen</label>
        <input type="file" class="form-control" name="imagen" aria-label="file example" required>
        <div class="invalid-feedback">Example invalid form file feedback</div>
      </div>

      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input">
        <label class="form-check-label">Recordarme</label>
      </div>
      <button class="btn w-100" style="background-color:#0e144bff; color:white;">Registrarme</button>
    </form>
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
