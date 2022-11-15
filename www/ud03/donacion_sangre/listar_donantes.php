<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Donación Sangre</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
  <h1>Listar Donantes</h1>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


  <table class="table">
    <thead class="thead-light">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellidos</th>
        <th scope="col">Edad</th>
        <th scope="col">Grupo Sanguíneo</th>
        <th scope="col">Código Postal</th>
        <th scope="col">Teléfono Móvil</th>
      </tr>
    </thead>
    <tbody>

      <?php

      //1. Conectar a la base de datos

      $sname = "db";
      $uname = "root";
      $passwd = "test";

      try {
        $conexion = new PDO("mysql:host=$sname;dbname=TIENDA", $uname, $passwd);

        //2. Comprobar la conexión

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "<p>Conexión correcta</p>";

        //3. Recuperar de base de datos los donantes

        $stmt = $conexion->prepare("SELECT * FROM Usuarios");
        $stmt->execute();

        //4. Imprimir los donantes en forma de tabla e insertar los botones de registrar, eliminar y listar donaciones. 
        /*AYUDA: Usar un bucle e intercalar etiquetas de html en el php. 
      Para los botones pasar el id como argumento. 
      Cuando registremos las donaciones debemos insertar una entrada en el historico. 
      */
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach ($stmt->fetchAll() as $key => $v) {
          echo "<tr><td scope=\"col\">" . $v["id"] . "</td>",
          "<td scope=\"col\">" . $v["nombre"] . "</td>",
          "<td scope=\"col\">" . $v["apellidos"] . "</td>",
          "<td scope=\"col\">" . $v["edad"] . "</td>",
          "<td scope=\"col\">" . $v["grupoSanguineo"] . "</td>",
          "<td scope=\"col\">" . $v["codigoPostal"] . "</td>",
          "<td scope=\"col\">" . $v["telefonoMovil"] . "</td></tr>";
        }

        // Excepciones

      } catch (PDOException $e) {
        echo "Fallo en conexión: " . $e->getMessage();
      }


      //5. Cerrar la conexión
      $conexion = null;

      ?>
    </tbody>
  </table>
  </div>













</body>

</html>