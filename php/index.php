<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página con Bootstrap</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
   body {
      background-image: url("camion.jpg");
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      min-height: 100vh;
    }

    .container {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    @media (min-width: 768px) {
      body { 
        background-size: 700px 1200px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="text-center">
      <h1 class="text-white">Bienvenidos</h1>
      <div class="my-3">
        <a href="login.php"><button class="btn btn-primary">Ingresar</button></a>
        <a href="registro.php"> <button class="btn btn-success">Registrar</button></a>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
