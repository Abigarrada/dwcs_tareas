<?php
function execute_query($conexion, $query, $okMsg, $errMsg = "Ha ocurrido un error")
{
    if ($result = $conexion->query($query)) {
        echo "<p class=\"text-success\">$okMsg</p>";
        return $result;
    } else {
        echo "<p class=\"text-danger\">$errMsg:<br/>$conexion->error</p>";
    }
}

function crea_bbdd_y_conecta()
{
    $conexion = conecta_bbdd("");

    execute_query($conexion, "CREATE DATABASE IF NOT EXISTS tienda", "");

    $conexion->select_db("tienda");

    $sqlTAB = "CREATE TABLE IF NOT EXISTS usuarios (
        id INT AUTO_INCREMENT PRIMARY KEY, 
        nombre VARCHAR(50) NOT NULL,
        apellidos VARCHAR(100) NOT NULL,
        edad INT NOT NULL,
        provincia VARCHAR(50) NOT NULL
        )";

    execute_query($conexion, $sqlTAB, "");
    return $conexion;
}

function crea_o_actualiza_usuario($conexion, $id)
{

    $lp = ["", "A Coruña", "Lugo", "Ourense", "Pontevedra"];

    $nombreErr = $apellidosErr = $edadErr = $provinciaErr = "";
    $nombre = $apellidos = $edad = $provincia = "";
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
            if ($id != null) {
                $sqlMOD = "UPDATE usuarios SET nombre='$nombre', apellidos='$apellidos', edad=$edad, provincia='$provincia' WHERE id=$id";
                execute_query($conexion, $sqlMOD, "El usuario se ha modificado correctamente");
            } else {
                $sqlQUERY = "INSERT INTO usuarios (nombre, apellidos, edad, provincia) VALUES ('$nombre', '$apellidos', $edad, '$provincia');";
                execute_query($conexion, $sqlQUERY, "El usuario se ha creado correctamente");
            }
        } else {
            echo "<p class=\"text-danger\">Ha habido los siguientes errores:</p>";
            echo $nombreErr ?? "-";
            echo $apellidosErr ?? "-";
            echo $edadErr ?? "-";
            echo $provinciaErr ?? "-";
        }
    }

    $conexion->close();
}

function conecta_bbdd($bd = 'tienda')
{
    $conexion = new mysqli('db', 'root', 'test', $bd);

    $error = $conexion->connect_error;
    if ($error != null) {
        die("Fallo en la conexión: " . $conexion->connect_error . "Con número" . $error);
    }
    return $conexion;
}

function listar_usuarios($conexion)
{
    $sqlSEL = "SELECT * FROM usuarios";

    $results = execute_query($conexion, $sqlSEL, "");

    if ($results->num_rows > 0) {

        while ($row = $results->fetch_assoc()) {
            echo "<tr><td scope=\"col\">" . $row["id"] . "</td>",
            "<td scope=\"col\">" . $row["nombre"] . "</td>",
            "<td scope=\"col\">" . $row["apellidos"] . "</td>",
            "<td scope=\"col\">" . $row["edad"] . "</td>",
            "<td scope=\"col\">" . $row["provincia"] . "</td>",
            "<td> <a class='btn btn-secondary' href=modificar.php?id=" . $row['id'] . ">Modificar</a> </td>",
            "<td> <a class='btn btn-danger' href=borrar.php?id=" . $row['id'] . ">Eliminar</a> </td>",
            "</tr>";
        }
    }
}

function busca_usuario($id, $conexion)
{
    if ($id != null) {
        $sqlSEL = "SELECT id, nombre, apellidos, edad, provincia FROM usuarios WHERE id=$id";

        $results = $conexion->query($sqlSEL);

        if ($results->num_rows == 1) {
            return  $results->fetch_assoc();
        }
    }
    return null;
}

function borra_usuario($id, $conexion)
{
    if ($id != null) {
        $sqlDEL = "DELETE FROM usuarios WHERE id=$id";
        execute_query($conexion, $sqlDEL, "El usuario se ha eliminado correctamente");
    } else {
        echo "<p class=\"text-danger\">Escoja un usuario válido.</p>";
    }
    $conexion->close();
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
