<!DOCTYPE html>
<html>
<head>
    <title>Inicio de sesión</title>
    <!-- Agregamos los estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/transition-style">
</head>
<body>
<header>
<div class="px-3 py-2 text-bg-primary border-bottom">
      <div class="container">

        <div class="text-end">
        <a href="login.php"><button type="button" class="btn btn-outline-light me-2">Ingresar</button></a>
        <a href="registro.php"><button type="button" class="btn btn-outline-light me-2">Registrarse</button></a>
      </div>
    </div>
<div class="px-3 py-2 border-bottom mb-3">
  <div class="container">
    <div class="text-center">
      <div transition-style="in:wipe:up">
        <h1 class="text-white">Bienvenidos</h1>
      </div>
    </div>
  </div>
  </header>
    <div class="container">
        <h1 class="my-4">Iniciar sesión</h1>
        <form method="post" action="validar.php">
            <div class="form-group">
                <label for="username">Nombre de usuario:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Iniciar sesión</button>
            </div>
        </form>
    </div>
    <!-- Agregamos los scripts de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>


