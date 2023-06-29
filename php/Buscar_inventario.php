<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear Ingreso</title>
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
                  Inventario
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
                  Viajes
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
        
      </div>

  </header>

  <div class="container mt-4">
    <h1>Buscar Inventario</h1>
    <form method="GET">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Buscar por referencia, producto o descripción" name="search_query">
        <button class="btn btn-primary" type="submit">Buscar</button>
      </div>
    </form>

    <?php
    // Verificar si se ha enviado una consulta de búsqueda
    if (isset($_GET['search_query'])) {
      $searchQuery = $_GET['search_query'];

      // Realizar la consulta SQL para buscar en la tabla inventario
      $sql = "SELECT * FROM inventario
              WHERE referencia LIKE '%$searchQuery%'
              OR descripcion LIKE '%$searchQuery%'
              OR observaciones LIKE '%$searchQuery%'";

      // Establecer la conexión con la base de datos
      $servername = "localhost";
      $username = "root";
      $password = "0607";
      $dbname = "automuelles";

      $conn = new mysqli($servername, $username, $password, $dbname);

      if ($conn->connect_error) {
        die("La conexión a la base de datos falló: " . $conn->connect_error);
      }

      // Ejecutar la consulta SQL
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // Mostrar los resultados de la búsqueda
        while ($row = $result->fetch_assoc()) {
          $imagen_contenido = $row['imagen_contenido'];
          $imagen_tipo = $row['imagen_tipo'];
          $imagen_src = 'data:' . $imagen_tipo . ';base64,' . base64_encode($imagen_contenido);
    ?>

          <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="<?php echo $imagen_src; ?>" alt="Imagen" class="img-fluid">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Referencia: <?php echo $row['referencia']; ?></h5>
                  <p class="card-text">Descripción: <?php echo $row['descripcion']; ?></p>
                  <p class="card-text">Observaciones: <?php echo $row['observaciones']; ?></p>
                  <a href="descargar_imagen.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Descargar Imagen</a>
                </div>
              </div>
            </div>
          </div>
    <?php
        }
      } else {
        echo "No se encontraron resultados.";
      }

      $conn->close();
    }
    ?>
</div>

  <!-- footer -->
  <div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
      <p class="col-md-4 mb-0 text-body-secondary">© 2023 Automuelles Inc</p>

      <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
          <use xlink:href="#bootstrap"></use>
        </svg>
      </a>

      <ul class="nav col-md-4 justify-content-end">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
      </ul>
    </footer>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>