<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página con Bootstrap</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>

<body>
  <header>
    <div class="px-3 py-2 text-bg-primary border-bottom">
      <div class="container">
        <div class="px-3 py-2 border-bottom mb-3">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
              <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                <use xlink:href="#bootstrap"></use>
              </svg>
            </a>
            <style>
              /* Estilos para los enlaces */
              a.nav-link,
              a.nav-link:hover,
              a.nav-link:focus,
              a.nav-link:active {
                color: white !important;
                text-decoration: none !important;
              }
            </style>

            <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
              <li>
                <a href="#" class="nav-link text-secondary">
                  <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                    <use xlink:href="#home"></use>
                  </svg>
                  Inicio
                </a>
              </li>
              <li>
                <a href="#" class="nav-link text-white">
                  <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                    <use xlink:href="#speedometer2"></use>
                  </svg>
                  Domicilios
                </a>
              </li>
              <li>
                <a href="#" class="nav-link text-white">
                  <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                    <use xlink:href="#table"></use>
                  </svg>
                  Base de Conocimiento
                </a>
              </li>
              <li>
                <a href="#" class="nav-link text-white">
                  <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                    <use xlink:href="#grid"></use>
                  </svg>
                  Cotizaciones
                </a>
              </li>
              <li>
                <a href="#" class="nav-link text-white">
                  <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                    <use xlink:href="#people-circle"></use>
                  </svg>
                  Ubicaciones
                </a>
              </li>
            </ul>
            <div class="dropdown text-end">
              <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle show" data-bs-toggle="dropdown" aria-expanded="true">

                <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                <?php
                session_start();
                if (isset($_SESSION['username'])) {
                  echo '<a class="dropdown-item" href="#">' . $_SESSION['username'] . '</a>';
                }
                ?>
              </a>

              <ul class="dropdown-menu text-small show" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 34px);" data-popper-placement="bottom-start">

                <li><a class="dropdown-item" href="#">Historial</a></li>
                <li><a class="dropdown-item" href="#">Opciones</a></li>
                <li><a class="dropdown-item" href="#">Perfil</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Salir</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
  </header>
  
  <div class="container">
    <h1 class="mt-4">Formulario de Cotizaciones</h1>

    <form action="guardar_cotizacion.php" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="lugar">Lugar de la cotización:</label>
        <input type="text" class="form-control" id="lugar" name="lugar" required>
      </div>
<br>
      <div class="form-group">
        <label for="repuesto">Repuesto Cotizado:</label>
        <input type="text" class="form-control" id="repuesto" name="repuesto" required>
      </div>
      <br>
      <div class="form-group">
        <label for="precio">Precio Cotizado:</label>
        <input type="number" class="form-control" id="precio" name="precio" required>
      </div>
      <br>
      <div class="form-group">
        <label for="iva">IVA:</label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="iva_incluido" name="iva" value="incluido" required>
          <label class="form-check-label" for="iva_incluido">Incluido</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="iva_mas" name="iva" value="mas" required>
          <label class="form-check-label" for="iva_mas">+IVA</label>
        </div>
      </div>
      <br>
      <div class="form-group">
        <label for="iva">Comprar:</label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="iva_incluido" name="iva" value="incluido" required>
          <label class="form-check-label" for="iva_incluido">comprar</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="iva_mas" name="iva" value="mas" required>
          <label class="form-check-label" for="iva_mas">Cotizar</label>
        </div>
      </div>
      <br>
      <div class="form-group">
        <label for="foto">Agregar Fotografía:</label>
        <input type="file" class="form-control-file" id="foto" name="foto">
      </div>
      <br>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
  </div>

  <!-- footer -->
  <div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
      <p class="col-md-4 mb-0 text-body-secondary">© 2023 Automuelles, Inc</p>

      <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
          <use xlink:href="#bootstrap"></use>
        </svg>
      </a>
    </footer>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>

</html>