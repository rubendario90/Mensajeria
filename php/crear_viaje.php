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
   <!-- Boostrap Nav -->

   <nav class="navbar navbar-expand-lg bg-primary">
      <div class="container-fluid">
        <div class="d-flex align-items-center">
          <a href="#" class="text-white me-3">
            <i class="fas fa-user"></i>
          </a>
          <div class="dropdown">
            <button class="btn btn-light rounded-circle dropdown-toggle" type="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-user"></i>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <li><a class="dropdown-item" href="#">Perfil</a></li>
              <li><a class="dropdown-item" href="#">Viajes creados</a></li>
              <li><a class="dropdown-item" href="#">Viajes asignados</a></li>
              <li><a class="dropdown-item" href="#">Salir</a></li>
            </ul>
          </div>
        </div>
        <?php
        if (isset($_SESSION['username'])) { ?>
          <h3 style="color:white;">Bienvenido <?php echo $_SESSION['username']; ?>!</h3>
        <?php } ?>
        <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active text-white" aria-current="page" href="#">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="./pages/recetas.html">Recetas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#">Colaborar</a>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Que deseas buscar?" aria-label="Search">
            <button class="btn btn-light" type="submit">Buscar</button>
          </form>
        </div>
      </div>
    </nav>
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

      <ul class="nav col-md-4 justify-content-end">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
      </ul>
    </footer>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>

</html>

