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

    function executeQuery($conexion, $query, $okMsg, $errMsg = "Ha ocurrido un error")
    {
      if ($conexion->query($query)) {
        echo "<p class=\"text-success\">$okMsg</p>";
      } else {
        echo "<p class=\"text-danger\">$errMsg:<br/>$conexion->error</p>";
      }
    }

    function test_input($data)
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    // Recoger los datos del formulario y validación

    $lp = ["", "A Coruña", "Lugo", "Ourense", "Pontevedra"];

    $nombreErr = $apellidosErr = $edadErr = $provinciaErr = "";
    $nombre = $apellidos = $edad = $provincia = "";


    //1. Crear la conexión 
    $conexion = new mysqli('db', 'root', 'test');

    //2. Comprobar la conexión
    $error = $conexion->connect_error;
    if ($error != null) {
      die("Fallo en la conexión: " . $conexion->connect_error . "Con número" . $error);
    }
    echo "Conexión correcta";

    //3. Insertar datos
    executeQuery($conexion, "CREATE DATABASE IF NOT EXISTS tienda", "");

    $conexion->select_db("tienda");

    $sqlTAB = "CREATE TABLE IF NOT EXISTS usuarios (
        id INT AUTO_INCREMENT PRIMARY KEY, 
        nombre VARCHAR(50) NOT NULL,
        apellidos VARCHAR(100) NOT NULL,
        edad INT NOT NULL,
        provincia VARCHAR(50) NOT NULL
        )";

    executeQuery($conexion, $sqlTAB, "");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $hasError = false;
      if (empty($_POST["nombre"])) {
        $nombreErr = "Introduce un nombre";
        $hasError = true;
      } else {
        $nombre = test_input($_POST["nombre"]);
      }

      if (empty($_POST["apellidos"])) {
        $apellidosErr = "Introduce un apellido";
        $hasError = true;
      } else {
        $apellidos = test_input($_POST["apellidos"]);
      }

      if (empty($_POST["edad"])) {
        $edadErr = "Introduce tu edad";
        $hasError = true;
      } else {
        $edad = test_input($_POST["edad"]);
      }

      if (empty($_POST["provincia"])) {
        $provinciaErr = "Selecciona tu provincia";
        $hasError = true;
      } else {
        $provincia = $lp[test_input($_POST["provincia"])];
      }

      if (!$hasError) {

        $sqlQUERY = "INSERT INTO usuarios (nombre, apellidos, edad, provincia) 
VALUES ('$nombre', '$apellidos', $edad, '$provincia');";

        executeQuery($conexion, $sqlQUERY, "El usuario se ha creado correctamente");
      } else {
        echo "<p class=\"text-danger\">Ha habido los siguientes errores:</p>";
        echo $nombreErr ?? "-";
        echo $apellidosErr ?? "-";
        echo $edadErr ?? "-";
        echo $provinciaErr ?? "-";
      }
    }

    //Cerrar la conexión
    $conexion->close();


    ?>
  </div>

  <footer class="container">
    <br><a class="text-info" href="./index.php">Volver al inicio</a>
  </footer>

</body>

</html>