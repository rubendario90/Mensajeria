<?php

$servername = "localhost";
$username = "root";
$password = "0607";
$dbname = "automuelles";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar conexión
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

// Procesar envío del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre = $_POST["nombre"];
  $apellido = $_POST["apellido"];
  $correo = $_POST["correo"];
  $nombre_usuario = $_POST["nombre_usuario"];
  $rol = $_POST["rol"];
  $contraseña = $_POST["contraseña"];

  // Insertar datos en la tabla "usuario"
  $sql = "INSERT INTO usuario (nombre, apellido, correo, nombre_usuario, rol, contraseña) VALUES ('$nombre', '$apellido', '$correo', '$nombre_usuario', '$rol', '$contraseña')";

  if ($conn->query($sql) === TRUE) {
    // Redirigir al usuario a la página de inicio
    header("Location: inicio.php");
    exit();
  } else {
    echo "Error al insertar registro: " . $conn->error;
  }
}

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
    
  </header>
  
  <!-- registro -->
  <div class="container">
    <h1>Registro de usuario</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" class="form-control" name="nombre" required>
      </div>
      <div class="form-group">
        <label for="apellido">Apellido:</label>
        <input type="text" class="form-control" name="apellido" required>
      </div>
      <div class="form-group">
        <label for="correo">Correo electrónico:</label>
        <input type="email" class="form-control" name="correo" required>
      </div>
      <div class="form-group">
        <label for="nombre_usuario">Nombre de usuario:</label>
        <input type="text" class="form-control" name="nombre_usuario" required>
      </div>
      <div class="form-group">
        <label for="contraseña">Contraseña:</label>
        <input type="password" class="form-control" name="contraseña" required>
      </div>
      <div class="form-group">
        <label for="rol">Rol:</label>
        <select class="form-control" name="rol" required>
          <option value="">Selecciona un rol</option>
          <option value="vendedor">Vendedor</option>
          <option value="mensajero">Mensajero</option>
        </select>
      </div>
      <br>
      <button type="submit" class="btn btn-primary" name="submit">Enviar</button>
    </form>
  </div>

  <!-- footer -->
  <div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
      <p class="col-md-4 mb-0 text-body-secondary">© 2023 Automuelles Diesel</p>

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