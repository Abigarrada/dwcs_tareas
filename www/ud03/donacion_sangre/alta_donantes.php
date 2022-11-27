<?php


// Recoger los datos del formulario y validación

$listaGrSanguineo = ["O-", "O+", "A-", "A+", "B-", "B+", "AB-", "AB+"];

$nombreErr = $apellidosErr = $edadErr = $grSanguineoErr = $codPostalErr = $movilErr = "";
$nombre = $apellidos = $edad = $grSanguineo = $codPostal = $movil = "";

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

  if (empty($_POST["grupoSanguineo"])) {
    $grSanguineoErr = "Selecciona tu provincia";
  } else {
    $grSanguineo = $listaProvincias[test_input($_POST["grupoSanguineo"])];
  }

  if (empty($_POST["codigoPostal"])) {
    $codPostalErr = "Introduce tu código postal";
  } else {
    $codPostal = test_input($_POST["codigoPostal"]);
  }

  if (empty($_POST["telMovil"])) {
    $movilErr = "Introduce tu número de teléfono móvil";
  } else {
    $movil = test_input($_POST["telMovil"]);
  }
}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


//1. Conectar a la base de datos

//2. Comprobar la conexión

//3. Recoger los datos del formulario 

//4. Validar los datos del formulario evitando posibles ataques y comprobando que estén los datos obligatorios. 

//5. Insertar el registro en la base de datos

//6. Comprobar la insercción 

//7. Cerrar la conexión 

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Donación Sangre</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <br>
    <h1 class="display-1">Alta Donantes</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      Nombre: <input type="text" class="form-control" name="name">
      <br><br>
      Apellidos: <input type="text" class="form-control" name="apellidos">
      <br><br>
      Edad: <input type="number" class="form-control" name="edad">
      <br><br>
      <label class="my-1 mr-2" for="grupoSanguineo">Grupo sanguíneo:</label>
      <select class="form-control" id="grupoSanguineo">
        <option value="0" selected>Elegir: </option>
        <option value="1">O-</option>
        <option value="2">O+</option>
        <option value="3">A-</option>
        <option value="4">A+</option>
        <option value="5">B-</option>
        <option value="6">B+</option>
        <option value="7">AB-</option>
        <option value="8">AB+</option>
      </select>
      <br><br>
      Código Postal: <input type="number" class="form-control" name="codigoPostal">
      <br><br>
      Teléfono móvil: <input type="number" class="form-control" name="telMovil">
      <br><br>
      <input type="submit" name="submit" class="btn btn-danger" value="Añadir">
      <!-- 6. Completar el formulario -->
    </form>
  </div>

  <div class="container">
    <br>
    <?php

    $sname = "db";
    $uname = "root";
    $passwd = "test";

    try {
      $conexion = new PDO("mysql:host=$sname;dbname=TIENDA", $uname, $passwd);
      // Comprobación de conexión
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "<p>Conexión correcta</p><br>";


      // Inserción del registro en la base de datos

      $stmt = $conexion->prepare("INSERT INTO donantes (nombre, apellidos, edad, grupoSanguineo, codigoPostal, telefonoMovil)
    VALUES (:nombre, :apellido, :edad, :provincia)");
      $stmt->bindParam(':nombre', $nombre);
      $stmt->bindParam(':apellido', $apellidos);
      $stmt->bindParam(':edad', $edad);
      $stmt->bindParam(':grupoSanguineo', $grSanguineo);
      $stmt->bindParam(':codigoPostal', $codPostal);
      $stmt->bindParam(':telefonoMovil', $movil);

      $stmt->execute();

      // Comprobar la insercción 
      $ultimoId = $conexion->lastInsertId();
      echo "<p class=\"text-success\">uevo registro creado. Último ID insertado:" . $ultimoId . "</p>";

      // Excepciones

    } catch (PDOException $e) {
      echo "Fallo en conexión: " . $e->getMessage();
    }

    // Cerrar la conexión 

    $conexion = null;

    ?>

  </div>

  <footer class="container">
    <br><a class="text-info" href="./index.php">Volver al inicio</a>
  </footer>

</body>

</html>