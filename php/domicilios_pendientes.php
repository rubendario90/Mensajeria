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
        
        <div class="text-end">
            <button type="button" class="btn btn-outline-light me-2">
              Ingresar
            </button>
            <button type="button" class="btn btn-outline-light me-2">
              Registrarse
            </button>
          </div>
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
                <a href="inicio.php" class="nav-link text-secondary">
                  <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                    <use xlink:href="#home"></use>
                  </svg>
                  Inicio
                </a>
              </li>
              <li>
                <a href="Domicilios.php" class="nav-link text-white">
                  <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                    <use xlink:href="#speedometer2"></use>
                  </svg>
                  Domicilios
                </a>
              </li>
              <li>
                <a href="inicio_Inventario.php" class="nav-link text-white">
                  <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                    <use xlink:href="#table"></use>
                  </svg>
                  Bodega
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
                <a href="maps.php" class="nav-link text-white">
                  <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                    <use xlink:href="#people-circle"></use>
                  </svg>
                  Maps
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
        <input type="search" class="form-control form-control-dark text-bg-white" placeholder="Buscar..." aria-label="Search">
      </div>

  </header>

  <div class="container">
    <h2>Lista de Viajes Pendientes</h2>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre de Logueo</th>
          <th>Número de Factura</th>
          <th>Nombre del Cliente</th>
          <th>Número de Contacto</th>
          <th>Lugar de Entrega</th>
          <th>Observaciones</th>
          <th>Mensajero</th>
          <th>Estado</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
          // Ejemplo de datos de viajes pendientes
          $automuelles = [
            [
              'id' => 1,
              'nombre_logueo' => 'John Doe',
              'numero_factura' => 'F12345',
              'nombre_cliente' => 'Cliente 1',
              'numero_contacto' => '123456789',
              'lugar_entrega' => 'Dirección 1',
              'observaciones' => 'Observación 1',
              'mensajero' => 'Mensajero 1',
              'estado' => 'Pendiente',
            ],
            [
              'id' => 2,
              'nombre_logueo' => 'Jane Smith',
              'numero_factura' => 'F67890',
              'nombre_cliente' => 'Cliente 2',
              'numero_contacto' => '987654321',
              'lugar_entrega' => 'Dirección 2',
              'observaciones' => 'Observación 2',
              'mensajero' => 'Mensajero 2',
              'estado' => 'Pendiente',
            ],
          ];

          foreach ($automuelles as $viaje) {
            echo '<tr>';
            echo '<td>' . $viaje['id'] . '</td>';
            echo '<td>' . $viaje['nombre_logueo'] . '</td>';
            echo '<td>' . $viaje['numero_factura'] . '</td>';
            echo '<td>' . $viaje['nombre_cliente'] . '</td>';
            echo '<td>' . $viaje['numero_contacto'] . '</td>';
            echo '<td>' . $viaje['lugar_entrega'] . '</td>';
            echo '<td>' . $viaje['observaciones'] . '</td>';
            echo '<td><input type="text" value="' . $viaje['mensajero'] . '"></td>';
            echo '<td><input type="text" value="' . $viaje['estado'] . '"></td>';
            echo '<td><button class="btn btn-primary">Guardar</button></td>';
            echo '</tr>';
          }
        ?>
      </tbody>
    </table>
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