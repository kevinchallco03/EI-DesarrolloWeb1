<?php 
  require_once('./controladores/funciones.php');
  if(isset($_COOKIE['email'])){
    $bd = conexion('localhost','panaderia','root','');
    $usuario = buscarPorEmail($bd,'usuarios',$_COOKIE['email']);
    seteoUsuario($usuario);
  }
?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paradise Cake - Inicio</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

      <?php require_once('./partials/barraNavegacion.php') ?>

        <div class="container-fluid p-0 position-relative">
            
            <div id="carouselPostres" class="carousel slide" data-bs-interval="false">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/postre1.jpg" class="d-block w-100" alt="Postre 1" 
                             style="height: 910px; object-fit: cover; object-position: center; filter: brightness(0.5);">
                    </div>
                    <div class="carousel-item">
                         <img src="img/postre2.jpg" class="d-block w-100" alt="Postre 2"
                             style="height: 910px; object-fit: cover; object-position: center; filter: brightness(0.5);">
                    </div>
                    <div class="carousel-item">
                        <img src="img/postre3.jpg" class="d-block w-100" alt="Postre 3"
                             style="height: 910px; object-fit: cover; object-position: center; filter: brightness(0.5);">
                    </div>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselPostres" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselPostres" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>

            <div class="position-absolute top-50 start-50 translate-middle w-100 d-flex justify-content-center" style="z-index: 10;">
                
                <div class="card glass-card text-center p-4" style="width: 26rem;">
                    <div class="card-body">
                        <h2 class="card-title fw-bold mb-3" style="color: #0e144b;">Gestión de Postres</h2>
                        
                        <p class="card-text mb-4 text-muted">
                            Administra el catálogo de Paradise Cake, añade nuevas delicias o edita las existentes.
                        </p>
                        
                        <a href="registroPostres.php" class="btn btn-lg w-100 rounded-pill" 
                           style="background-color: #0e144b; color: #ffffff; border: 1px solid #0e144b;">
                            <i class="bi bi-plus-circle me-2"></i> Registrar Postres
                        </a>

                    </div>
                </div>

            </div>

        </div>
        <footer class="text-white pt-5 pb-4" style="background-color: #0e144b;">
        <div class="container text-center text-md-start">
            <div class="row text-center text-md-start">
                
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 fw-bold text-warning">Paradise Cake</h5>
                    <p>
                        Dedicados a crear los postres más deliciosos y artísticos para tus momentos especiales. Calidad y dulzura en cada bocado.
                    </p>
                </div>

                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 fw-bold text-warning">Menú</h5>
                    <p><a href="#" class="text-white text-decoration-none footer-link">Inicio</a></p>
                </div>

                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 fw-bold text-warning">Contacto</h5>
                    <p><i class="bi bi-house-door-fill me-2"></i> Av. Los Postres 123, Lima</p>
                    <p><i class="bi bi-envelope-fill me-2"></i> info@paradisecake.com</p>
                    <p><i class="bi bi-telephone-fill me-2"></i> +51 987 654 321</p>
                </div>

                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                     <h5 class="text-uppercase mb-4 fw-bold text-warning">Síguenos</h5>
                     <a href="#" class="btn btn-outline-light btn-floating m-1 rounded-circle" role="button"><i class="bi bi-facebook"></i></a>
                     <a href="#" class="btn btn-outline-light btn-floating m-1 rounded-circle" role="button"><i class="bi bi-instagram"></i></a>
                     <a href="#" class="btn btn-outline-light btn-floating m-1 rounded-circle" role="button"><i class="bi bi-tiktok"></i></a>
                </div>

            </div>

            <hr class="mb-4">

            <div class="row align-items-center">
                <div class="col-md-7 col-lg-8">
                    <p>© 2025 Copyright:
                        <a href="#" class="text-warning text-decoration-none"><strong>Paradise Cake</strong></a>
                        - Todos los derechos reservados.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>