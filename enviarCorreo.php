<?php 
  require_once('./controladores/funciones.php');
  $bd = conexion('localhost', 'panaderia', 'root', '');

  $id = $_GET['id'];
  $usuario = buscarUsuario($bd, 'users', $id);

if (isset($_POST['enviarCorreo'])) {
    enviarCorreo($usuario, $_POST['mensaje']); 
    $mensaje = "Correo enviado correctamente.";

}

?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Enviar Correo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>

<?php require_once('./partials/barraNavegacion.php') ?>    

<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
  <div class="card shadow-lg p-4" style="width: 35rem; border-radius: 15px;">
    
    <h2 class="text-center mb-4" style="color: #0e144bff;">Enviar Correo</h2>

    <?php if(isset($mensaje)): ?>
      <div class="alert alert-success text-center"><?= $mensaje ?></div>
    <?php endif; ?>

    <ul class="list-group mb-3">
      <li class="list-group-item"><b>Nombre:</b> <?= $usuario['nombre'] ?></li>
      <li class="list-group-item"><b>Apellido:</b> <?= $usuario['apellido'] ?></li>
      <li class="list-group-item"><b>Correo:</b> <?= $usuario['email'] ?></li>
    </ul>

    <form method="POST">

      <div class="mb-3">
        <label class="form-label">Mensaje para enviar por correo:</label>
        <textarea class="form-control" name="mensaje" rows="4" required></textarea>
      </div>

      <button type="submit" name="enviarCorreo" class="btn w-100" style="background:#0e144bff; color:white;">
        Enviar Correo
      </button>
    </form>

  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
