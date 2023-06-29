<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Realizar la consulta SQL para obtener la información de la imagen
  $sql = "SELECT imagen_nombre, imagen_tipo, imagen_contenido FROM registro_viaje WHERE id = $id";

  // Establecer la conexión con la base de datos
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "automuelles";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
  }

  // Ejecutar la consulta SQL
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $imagen_nombre = $row['imagen_nombre'];
    $imagen_tipo = $row['imagen_tipo'];
    $imagen_contenido = $row['imagen_contenido'];

    // Enviar la imagen como respuesta para su descarga
    header("Content-type: $imagen_tipo");
    header("Content-Disposition: attachment; filename=$imagen_nombre");
    echo $imagen_contenido;
  } else {
    echo "No se encontró la imagen.";
  }

  $conn->close();
}
?>
