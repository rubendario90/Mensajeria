<?php
session_start(); // Iniciar sesión

// Comprobar si el usuario ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Conectar a la base de datos
    $conn = new mysqli('localhost', 'root', '0607', 'automuelles');

    // Comprobar si la conexión fue exitosa
    if ($conn->connect_error) {
        die('Error de conexión: ' . $conn->connect_error);
    }

    // Escapar las credenciales ingresadas por el usuario para evitar inyecciones SQL
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    // Consulta para buscar al usuario en la base de datos
    $query = "SELECT * FROM usuario WHERE nombre_usuario='$username' AND contraseña='$password'";

    // Ejecutar la consulta
    $result = $conn->query($query);

    // Comprobar si se encontró un usuario con esas credenciales
    if ($result->num_rows === 1) {
        // Iniciar sesión y redireccionar al usuario a la página de inicio
        $_SESSION['username'] = $username;
        header('Location: inicio.php');
        exit;
    } else {
        // Mostrar un mensaje de error
        echo 'Credenciales inválidas. Por favor, intente de nuevo.';
    }
}
?>