<?php
// Establecer la conexión con la base de datos
$servername = "localhost";
$username = "root";
$password = "0607";
$dbname = "automuelles";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("La conexión a la base de datos falló: " . $conn->connect_error);
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtener los valores del formulario
  $referencia = $_POST["referencia"];
  $descripcion = $_POST["descripcion"];
  $observaciones = $_POST["observaciones"];

  // Verificar si el campo 'descripcion' está vacío
  if (empty($descripcion)) {
    die("El campo 'descripcion' es requerido.");
  }

  // Manejar la carga de la imagen
  $imagen = $_FILES["imagen"]["tmp_name"];
  $imagen_nombre = $_FILES["imagen"]["name"];
  $imagen_tipo = $_FILES["imagen"]["type"];

  // Leer el contenido de la imagen
  $imagen_contenido = file_get_contents($imagen);

  // Preparar la consulta SQL para insertar los datos en la tabla inventario
  $sql = "INSERT INTO inventario (referencia, descripcion, observaciones, imagen_nombre, imagen_tipo, imagen_contenido)
          VALUES (?, ?, ?, ?, ?, ?)";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssssss", $referencia, $descripcion, $observaciones, $imagen_nombre, $imagen_tipo, $imagen_contenido);

  if ($stmt->execute()) {
    echo "Los datos se guardaron correctamente.";
  } else {
    echo "Error al guardar los datos: " . $stmt->error;
  }

  $stmt->close();
}

$conn->close();
?>

