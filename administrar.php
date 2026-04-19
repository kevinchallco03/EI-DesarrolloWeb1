<?php
require_once('./controladores/funciones.php');
$bd = conexion('localhost', 'panaderia', 'root', '');

if(!isset($_SESSION['nombre'])){
    header('location: login.php');
    exit;
}
if($_SESSION['perfil'] != 9){
    header('location: index.php');
    exit;
}

// Consultar usuarios
$sqlUsuarios = $bd->query("SELECT * FROM users");
$usuarios = $sqlUsuarios->fetchAll(PDO::FETCH_ASSOC);

// Consultar postres
$sqlPostres = $bd->query("SELECT * FROM desserts");
$postres = $sqlPostres->fetchAll(PDO::FETCH_ASSOC);

?>


<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Administrar</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <?php require_once('./partials/barraNavegacion.php'); ?>

    <div class="container mt-4">
      <h1 class="mb-4">Panel de Administración</h1>

      <!-- Tabla de Usuarios -->
      <h2>Usuarios Registrados</h2>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo Electrónico</th>
            <th>Foto</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php if(count($usuarios) > 0): ?>
            <?php foreach($usuarios as $usuario): ?>
              <tr>
                <td><?= htmlspecialchars($usuario['nombre']) ?></td>
                <td><?= htmlspecialchars($usuario['apellido']) ?></td>
                <td><?= htmlspecialchars($usuario['email']) ?></td>
                <td>
                  <?php if(!empty($usuario['image'])): ?>
                    <img src="img/<?= htmlspecialchars($usuario['image']) ?>" width="50" height="50" alt="Foto">
                  <?php else: ?>
                    Sin foto
                  <?php endif; ?>
                </td>
<td>
    <a href="enviarCorreo.php?id=<?= $usuario['id'] ?>" class="btn btn-sm btn-primary">Enviar Correo</a>
    <a href="editar_usuario.php?id=<?= $usuario['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
    <a href="eliminar_usuario.php?id=<?= $usuario['id'] ?>" class="btn btn-sm btn-danger">Eliminar</a>
</td>

              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="5" class="text-center">No hay usuarios registrados</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>

      <!-- Tabla de Postres -->
      <h2 class="mt-5">Postres Registrados</h2>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Nombre del Postre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Descuento</th>
            <th>Imagen</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php if(count($postres) > 0): ?>
            <?php foreach($postres as $postre): ?>
              <tr>
                <td><?= htmlspecialchars($postre['name']) ?></td>
                <td><?= htmlspecialchars($postre['descripcion']) ?></td>
                <td><?= htmlspecialchars($postre['price']) ?></td>
                <td><?= htmlspecialchars($postre['discount']) ?></td>
                <td>
                  <?php if(!empty($postre['image'])): ?>
                    <img src="img/<?= htmlspecialchars($postre['image']) ?>" width="50" height="50" alt="Imagen">
                  <?php else: ?>
                    Sin imagen
                  <?php endif; ?>
                </td>
                <td>
                  <a href="editar_postre.php?id=<?= $postre['id'] ?>" class="btn btn-sm btn-primary">Editar</a>
                  <a href="eliminar_postre.php?id=<?= $postre['id'] ?>" class="btn btn-sm btn-danger">Eliminar</a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="6" class="text-center">No hay postres registrados</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
