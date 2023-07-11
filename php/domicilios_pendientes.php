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

 <!-- CUERPO DE LA PAGINA -->
 <div class="container">
    <h1>Viajes Pendientes</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre Usuario</th>
                <th>Numero Factura</th>
                <th>Nombre Cliente</th>
                <th>Numero Contacto</th>
                <th>Lugar Entrega</th>
                <th>Observaciones</th>
                <th>Mensajero / Estado</th>
                <th>Guardar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Establecer la conexión con la base de datos
            $host = "localhost";
            $username = "root";
            $password = "0607";
            $database = "automuelles";
            $conn = new mysqli($host, $username, $password, $database);
            if ($conn->connect_error) {
                die("Error de conexión: " . $conn->connect_error);
            }

            // Actualizar los campos editables si se envió el formulario
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nombreUsuario = $_POST["nombreUsuario"];
                $mensajero = $_POST["mensajero"];
                $estado = $_POST["estado"];

                // Insertar o actualizar los valores en la base de datos
                $sql = "INSERT INTO viajes_2 (Nombre_Usuario, Numero_Factura, Nombre_Cliente, Numero_Contacto, Lugar_Entrega, Observaciones, Mensajero, Estado)
                        SELECT Nombre_logueo, Numero_Factura, Nombre_Cliente, Numero_Contacto, Lugar_Entrega, observaciones, '$mensajero', '$estado'
                        FROM viajes
                        WHERE Estado = 'pendiente' AND Nombre_logueo = '$nombreUsuario'
                        ON DUPLICATE KEY UPDATE Mensajero = '$mensajero', Estado = '$estado'";
                if ($conn->query($sql) === TRUE) {
                    echo "Valores guardados exitosamente.";
                } else {
                    echo "Error al guardar valores: " . $conn->error;
                }
            }

            // Consulta para obtener los viajes pendientes
            $sql = "SELECT * FROM viajes WHERE Estado = 'pendiente'";
            $result = $conn->query($sql);

            // Mostrar los resultados en la tabla
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["Nombre_logueo"] . "</td>";
                    echo "<td>" . $row["Numero_Factura"] . "</td>";
                    echo "<td>" . $row["Nombre_Cliente"] . "</td>";
                    echo "<td>" . $row["Numero_Contacto"] . "</td>";
                    echo "<td>" . $row["Lugar_Entrega"] . "</td>";
                    echo "<td>" . $row["observaciones"] . "</td>";
                    echo "<td>
                            <form method='post' action='" . $_SERVER["PHP_SELF"] . "'>
                                <input type='hidden' name='nombreUsuario' value='" . $row["Nombre_logueo"] . "'>
                                <input type='text' name='mensajero' value='" . $row["Mensajero"] . "'>
                                <input type='text' name='estado' value='" . $row["Estado"] . "'>
                            </td>";
                    echo "<td>
                                <input type='submit' value='Guardar'>
                            </form>
                        </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No hay viajes pendientes.</td></tr>";
            }

            // Cerrar la conexión a la base de datos
            $conn->close();
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