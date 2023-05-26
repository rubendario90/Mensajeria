<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listado de Viajes</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
 <!-- Bootstrap Nav -->
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
        session_start();
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
              <a class="nav-link text-white" href="#">Base de conocimiento</a>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Que deseas buscar?" aria-label="Search">
            <button class="btn btn-light" type="submit">Buscar</button>
          </form>
        </div>
      </div>
    </nav>
    
  <div class="container">
    <br>
    <br>
    <h2>Listado de Viajes Pendientes</h2>
    <?php
    // Conexión a la base de datos
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

    // Consulta SQL para obtener los viajes pendientes
    $sql = "SELECT * FROM viajes WHERE Estado = 'Pendiente'";

    // Ejecutar la consulta
    $result = $conn->query($sql);

    // Verificar si se encontraron registros
    if ($result->num_rows > 0) {
        echo '<table class="table">
                <thead>
                    <tr>
                        <th>Nombre de Usuario</th>
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
                <tbody>';
        // Recorrer los resultados y mostrar los datos
        while ($row = $result->fetch_assoc()) {
            echo '<tr>      
                    <td>' . $row["Nombre_logueo"] . '</td>
                    <td>' . $row["Numero_Factura"] . '</td>
                    <td>' . $row["Nombre_Cliente"] . '</td>
                    <td>' . $row["Numero_Contacto"] . '</td>
                    <td>' . $row["Lugar_Entrega"] . '</td>
                    <td>' . $row["observaciones"] . '</td>
                    <td>
                        <form method="POST" action="viajes_sin_asignar.php">
                            <input type="hidden" name="id" value="' . $row["id"] . '">
                            <input type="text" name="mensajero" placeholder="Mensajero" required>
                    </td>
                    <td>
                            <select name="estado" required>
                                <option value="Pendiente" selected>Pendiente</option>
                                <option value="Asignado">Asignado</option>
                                <option value="En Ruta">En Ruta</option>
                                <option value="Entregado">Entregado</option>
                            </select>   
                    </td>
                    <td>
                        <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
                    </td>
                  </tr>';
        }
        echo '</tbody></table>';
    } else {
        echo "No se encontraron viajes pendientes.";
    }

    // Cerrar la conexión
    $conn->close();
    ?>

    <!-- footer -->
    <div class="container">
      <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <p class="col-md-4 mb-0 text-body-secondary">© 2023 Company, Inc</p>

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

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
