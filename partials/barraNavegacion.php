<?php 

  if (session_status() === PHP_SESSION_NONE) {
      session_start();
  }
  

  require_once('./controladores/funciones.php');
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paradise Cake</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">  
</head>
  <body>       
    
<nav class="navbar navbar-expand-lg" style="background-color: #0e144bff;">
  <div class="container-fluid">

    <a class="navbar-brand d-flex align-items-center" href="index.php">
      <img src="img/logo.png" alt="Logo" width="30" height="30" class="me-2">
      <span class="text-white">Paradise Cake</span>
    </a>

    <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarContent">
      
      <div class="d-flex ms-auto align-items-center">
        
        <form class="d-flex me-3" role="search">
          <input class="form-control me-2" type="search" placeholder="Buscar producto ..." aria-label="Search"> 
          <button class="btn btn-outline-light" type="submit"><i class="bi bi-search"></i></button>
        </form>
        
        <?php if(!isset($_SESSION['nombre'])): ?> 
          <a class="btn btn-outline-light me-2" href="registroUsuarios.php">Registrarse</a>
          <a class="btn btn-outline-light" href="login.php">Iniciar Sesión</a>
        
        <?php else: ?>
          <?php if($_SESSION['perfil'] == 9): ?>
              <a class="btn btn-warning me-3 fw-bold" href="administrar.php">
                <i class="bi bi-gear-fill"></i> Administrar
              </a>
          <?php endif; ?>            

          <div class="me-2">
            <?php $imagen = !empty($_SESSION['image']) ? $_SESSION['image'] : 'default.png'; ?>
            <img style="border-radius: 50%; width: 40px; height: 40px; object-fit: cover; border: 2px solid white;" 
                 src="./img/<?= $imagen; ?>" 
                 alt="Avatar">
          </div>

          <span class="text-white me-3 fw-bold">
            <?= strtoupper($_SESSION['nombre']) . ' ' . strtoupper($_SESSION['apellido']) ?>
          </span>

          <a class="btn btn-danger btn-sm" href="logout.php">
             <i class="bi bi-box-arrow-right"></i> Salir
          </a>

        <?php endif; ?> 
      </div>
    </div>

  </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>