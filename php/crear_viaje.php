<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "0607";
$dbname = "Automuelles";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtener el nombre de usuario de la sesión
  $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

  // Obtener los valores del formulario
  $numeroFactura = $_POST["numeroFactura"];
  $nombreCliente = $_POST["nombreCliente"];
  $numeroContacto = $_POST["numeroContacto"];
  $lugarEntrega = $_POST["lugarEntrega"];
  $observaciones = $_POST["observaciones"];

  // Validar que el nombre de usuario no sea nulo
  if (!empty($username)) {
    // Consulta SQL para insertar los datos en la tabla viajes
    $insertSql = "INSERT INTO viajes (Nombre_logueo, Numero_Factura, Nombre_Cliente, Numero_Contacto, Lugar_Entrega, observaciones)
            VALUES ('$username', '$numeroFactura', '$nombreCliente', '$numeroContacto', '$lugarEntrega', '$observaciones')";

    // Ejecutar la consulta de inserción
    if ($conn->query($insertSql) === TRUE) {
      echo "Datos insertados correctamente.";
    } else {
      echo "Error al insertar datos: " . $conn->error;
    }
  } else {
    echo "Error: Nombre de usuario no válido.";
  }
}
// Cerrar la conexión
$conn->close();
?>

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
                  Viajes sin asignar
                </a>
              </li>
              <li>
                <a href="#" class="nav-link text-white">
                  <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                    <use xlink:href="#grid"></use>
                  </svg>
                  Crear Ingreso
                </a>
              </li>
              <li>
                <a href="#" class="nav-link text-white">
                  <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                    <use xlink:href="#people-circle"></use>
                  </svg>
                  Crear Viaje
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

                <li><a class="dropdown-item" href="#">viajes</a></li>
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
  <!-- crear viaje cuerpo del codigo -->

  <br>
  <br>
  <div class="container">
    <h2>Formulario de Registro de Viajes</h2>

    <form action="crear_viaje.php" method="POST">
      <div class="form-group">
        <label for="numeroFactura">Número de Factura:</label>
        <input type="text" class="form-control" id="numeroFactura" name="numeroFactura" required>
      </div>

      <br>

      <div class="form-group">
        <label for="nombreCliente">Nombre del Cliente:</label>
        <input type="text" class="form-control" id="nombreCliente" name="nombreCliente" required>
      </div>

      <br>

      <div class="form-group">
        <label for="numeroContacto">Número de Contacto:</label>
        <input type="text" class="form-control" id="numeroContacto" name="numeroContacto" required>
      </div>

      <br>

      <div class="form-group">
        <label for="lugarEntrega">Lugar de Entrega (Ubicaciones de Google):</label>
        <input type="text" class="form-control" id="lugarEntrega" name="lugarEntrega" required>
      </div>

      <br>

      <div class="form-group">
        <label for="observaciones">Observaciones:</label>
        <textarea class="form-control" id="observaciones" name="observaciones" rows="4" cols="50"></textarea>
      </div>

      <br>

      <button type="submit" class="btn btn-primary">Registrar Viaje</button>
    </form>
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
    </footer>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>

</html>