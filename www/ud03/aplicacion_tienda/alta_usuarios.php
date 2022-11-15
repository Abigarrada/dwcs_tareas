<?php

// Recoger los datos del formulario y validación

$lp = ["", "A Coruña", "Lugo", "Ourense", "Pontevedra"];

$nombreErr = $apellidosErr = $edadErr = $provinciaErr = "";
$nombre = $apellidos = $edad = $provincia = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["nombre"])) {
    $nombreErr = "Introduce un nombre";
  } else {
    $nombre = test_input($_POST["nombre"]);
  }

  if (empty($_POST["apellidos"])) {
    $apellidosErr = "Introduce un apellido";
  } else {
    $apellidos = test_input($_POST["apellidos"]);
  }

  if (empty($_POST["edad"])) {
    $edadErr = "Introduce tu edad";
  } else {
    $edad = test_input($_POST["edad"]);
  }

  if (empty($_POST["provincia"])) {
    $provinciaErr = "Selecciona tu provincia";
  } else {
    $provincia = $lp[test_input($_POST["provincia"])];
  }
}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>

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
      <select class="custom-select my-1 mr-sm-2" id="provincia">
        <option value="0" selected>Elegir: </option>
        <option value="1">A Coruña</option>
        <option value="2">Lugo</option>
        <option value="3">Ourense</option>
        <option value="4">Pontevedra</option>
      </select>
      <br><br>
      <input type="submit" class="btn btn-dark" name="submit" value="Enviar">
      <!-- 6. Completar el formulario -->
    </form>
  </div>

  <div class="container">
    <br>
    <?php


    //1. Crear la conexión 
    @$conexion = new mysqli('db', 'root', 'test', 'TIENDA');
    //2. Comprobar la conexión
    $error = $conexion->connect_error;
    if ($error != null) {
      die("Fallo en la conexión: " . $conexion->connect_error . "Con número" . $error);
    }
    echo "Conexión correcta";

    //3. Insertar datos
    $sql = "INSERT INTO Usuarios (nombre, apellidos, edad, provincia) 
VALUES ($nombre, $apellidos, $edad, $provincia);";
    //Comprobar inserción
    if ($conexion->query($sql)) {
      echo "<p class=\"text-success\">El usuario se ha creado correctamente</p>";
    } else {
      echo "<p class=\"text-danger\">Ha ocurrido un error: </p>" . $conexion->error;
    }

    //Cerrar la conexión
    $conexion->close();

    /*
    // Conexión a la base de datos

    $sname = "db";
    $uname = "root";
    $passwd = "test";

    try {
      $conexion = new PDO("mysql:host=$sname;dbname=TIENDA", $uname, $passwd);
      // Comprobación de conexión
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // echo "<p>Conexión correcta</p>";

      // Creacion base de datos
      $sql = "CREATE DATABASE TIENDA IF NOT EXISTS";
      // Crear tabla donantes
      $sql = "CREATE TABLE Usuarios IF NOT EXISTS(
        id INT AUTO_INCREMENT PRIMARY KEY, 
        nombre VARCHAR(50) NOT NULL,
        apellidos VARCHAR(100) NOT NULL,
        edad INT NOT NULL,
        provincia VARCHAR(50) NOT NULL
        )";

      // echo "Base de datos creada correctamente";

      // Inserción del registro en la base de datos

      $stmt = $conexion->prepare("INSERT INTO Usuarios (nombre, apellidos, edad, provincia)
    VALUES (:nombre, :apellido, :edad, :provincia)");
      $stmt->bindParam(':nombre', $nombre);
      $stmt->bindParam(':apellido', $apellidos);
      $stmt->bindParam(':edad', $edad);
      $stmt->bindParam(':provincia', $provincia);

      $stmt->execute();


      // Comprobar la insercción 

      echo "<p class=\"text-success\">El usuario se ha creado correctamente</p>";



      // Excepciones

    } catch (PDOException $e) {
      echo "Fallo en conexión: " . $e->getMessage();
    }

    // Cerrar la conexión 

    $conexion = null;
*/
    ?>
  </div>

  <footer class="container">
    <br><a class="text-info" href="./index.php">Volver al inicio</a>
  </footer>

</body>

</html>