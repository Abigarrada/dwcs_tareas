<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Les fleurs du café</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

  <div class="container">
    <h1 class="display-1">Les fleurs du café</h1>
  </div>

  <div class="container form-group">
    <br>
    <h2 class="display-3">Alta usuarios</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      Nombre: <input type="text" class="form-control" name="nombre">
      <br><br>
      Apellidos: <input type="text" class="form-control" name="apellidos">
      <br><br>
      Edad: <input type="number" class="form-control" name="edad">
      <br><br>
      <label class="my-1 mr-2" for="provincia">Provincia:</label>
      <select class="custom-select my-1 mr-sm-2" id="provincia" name="provincia">
        <option value="0" selected>Elegir: </option>
        <option value="1">A Coruña</option>
        <option value="2">Lugo</option>
        <option value="3">Ourense</option>
        <option value="4">Pontevedra</option>
      </select>
      <br><br>
      <input type="submit" class="btn btn-dark" name="submit" value="Enviar">
    </form>
  </div>

  <div class="container">
    <br>
    <?php
    include "funciones.php";

    $conexion = crea_bbdd_y_conecta();
    crea_o_actualiza_usuario($conexion, null);

    ?>
  </div>

  <footer class="container">
    <br><a class="text-info" href="./index.php">Volver al inicio</a>
  </footer>

</body>

</html>