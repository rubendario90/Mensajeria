<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listado de Viajes</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body>
<header>
    <div class="px-3 py-2 text-bg-secundary border-bottom">
      <div class="container">
        <div class="px-3 py-2 border-bottom mb-3">
        </div>
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
              color: black !important;
              text-decoration: none !important;
            }
          </style>
          <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
            <li>
              <a href="#" class="nav-link text-secundary">
                <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                  <use xlink:href="#home"></use>
                </svg>
                Inicio
              </a>
            </li>

          </ul>
          <div class="dropdown text-end">
              <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle show" data-bs-toggle="dropdown" aria-expanded="true">

                <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                <?php
                
                if (isset($_SESSION['username'])) {
                  echo '<a class="dropdown-item" href="#">' . $_SESSION['username'] . '</a>';
                }
                ?>
              </a>

              <ul class="dropdown-menu text-small show" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 34px);" data-popper-placement="bottom-start">

                <li><a class="dropdown-item" href="#">Nuevo Domicilio</a></li>
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
    <br>
    <br>
    <h2>Listado de Viajes Pendientes</h2>


    <!-- footer -->
    <div class="container">
      <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <p class="col-md-4 mb-0 text-body-secondary">© 2023 Company, Inc</p>

        <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
          <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap"></use>
          </svg>
        </a>


      </footer>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
