<?php 
    require_once('./controladores/funciones.php');

$errores =[];
if($_POST){
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];
    $errores = validarIniciar($_POST);

    if(count($errores) == 0){

      $bd = conexion('localhost','panaderia','root','');
        $usuario = buscarPorEmail($bd, 'users', $email);
        if($usuario === false){
            $errores['contrasena'] = 'Datos inválidos - Revise nuevamente.';
        }else{
            if(password_verify($contrasena, $usuario['password'])=== false){
                $errores['contrasena'] = 'Datos inválidos - Intente nuevamente.';
            }else{  seteoUsuario($usuario);

              if($_POST['recordarme']){
                    seteoCookies($_POST['email']);
                }
                header('location: index.php');
            }

        }
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
    <h2 class="text-center mb-4" style="color: #0e144bff;">Iniciar Sesión</h2>
      <?php  
        if(count($errores) > 0):?>
          <ul class="alert alert-danger">
            <?php 
              foreach ($errores as $key => $error) :?>
              <li><?= $error?></li>
            <?php endforeach;?>
          </ul>
      <?php endif;?>
    <form action="" method="post">
      <div class="mb-3">
        <label class="form-label">Correo Electrónico</label>
        <input type="email" class="form-control" name="email" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Contraseña</label>
        <input type="password" class="form-control" name="contrasena" required>
      </div>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input">
        <label class="form-check-label">Recordarme</label>
      </div>
      <button class="btn w-100" style="background-color:#0e144bff; color:white;">Ingresar</button>
    </form>
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>