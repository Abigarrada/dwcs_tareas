<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Les fleurs du café</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>

  <div class="container">
    <h1 class="display-1">Les fleurs du café</h1>
  </div>

  <div class="container">
    <h2 class="display-3">Lista de usuarios</h2>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <table class="table">
      <thead class="thead-light">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nombre</th>
          <th scope="col">Apellidos</th>
          <th scope="col">Edad</th>
          <th scope="col">Provincia</th>
          <!-- Completar la tabla -->
        </tr>
      </thead>
      <tbody>

        <?php

        //1. Crear la conexión 

        $sname = "db";
        $uname = "root";
        $passwd = "test";

        try {
          $conexion = new PDO("mysql:host=$sname;dbname=TIENDA", $uname, $passwd);
          //2. Comprobar la conexión
          $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          //echo "<p>Conexión correcta</p>";

          //3. Configurar una consulta SQL que selecciona las columnas id, nombre, apellido, edad y provincia de la tabla Cliente. 

          $stmt = $conexion->prepare("SELECT * FROM Usuarios");
          $stmt->execute();

          // resultados

          $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
          foreach ($stmt->fetchAll() as $key => $v) {
            echo "<tr><td scope=\"col\">" . $v["id"] . "</td>",
            "<td scope=\"col\">" . $v["nombre"] . "</td>",
            "<td scope=\"col\">" . $v["apellidos"] . "</td>",
            "<td scope=\"col\">" . $v["edad"] . "</td>",
            "<td scope=\"col\">" . $v["provincia"] . "</td></tr>";
          }

          // Excepciones

        } catch (PDOException $e) {
          echo "Fallo en conexión: " . $e->getMessage();
        }



        //5. Si se devuelven más de cero filas, recorrer los resultados e imprimir en una tabla los resultados 

        //Ejemplo: echo "<td>". $row['id']. "</td> "; 

        //6. Eliminar la fila correspondiente. 

        //Ejemplo:  echo "<td> <a class='btn btn-primary' href=borrar.php?id=".$row['id'].">Borrar</a> </td>";

        //7. Cerrar conexión 

        $conexion = null;

        ?>
      </tbody>
    </table>
  </div>
  <footer class="container">
    <br><a class="text-info" href="./index.php">Volver al inicio</a>
  </footer>

</body>

</html>