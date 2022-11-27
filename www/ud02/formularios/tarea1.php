<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Formulario 1</title>
</head>

<body>
    <form action="ex01.php" method="POST">
        <input type="text" name="nombre" placeholder="Nombre" />
        <input type="text" name="apellidos" placeholder="Apellidos" />
        <input type="submit" value="Enviar" />
    </form>
</body>

</html>

<?php

/**  Cree un formulario que solicite su nombre y apellido. Cuando se reciben los datos, se debe mostrar la siguiente información:
 * Nombre: `xxxxxxxxx`
 *  Apellidos: `xxxxxxxxx`
 * Nombre y apellidos: `xxxxxxxxxxxx xxxxxxxxxxxx`
 * Su nombre tiene caracteres `X`.
 * Los 3 primeros caracteres de tu nombre son: `xxx`
 * La letra A fue encontrada en sus apellidos en la posición: `X`
 * Tu nombre en mayúsculas es: `XXXXXXXXX`
 * Sus apellidos en minúsculas son: `xxxxxx`
 * Su nombre y apellido en mayúsculas: `XXXXXX XXXXXXXXXX`
 * Tu nombre escrito al revés es: `xxxxxx`
 */


if (isset($_POST["nombre"]) && isset($_POST["apellidos"])) {
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];

    echo "Nombre: " . $nombre . "<br/>";
    echo "Apellidos: " . $apellidos . "<br/>";
    echo "Nombre y apellidos: " . $nombre . " " . $apellidos . "<br/>";
    echo "Su nombre tiene " . strlen($nombre) . " caracteres. <br/>";
    echo "Los 3 primeros caracteres de tu nombre son: " . substr($nombre, 0, 3) . "<br/>";
    echo "La letra A fue encontrada en sus apellidos en la posición: " . $nombre . "<br/>";
    echo "Su nombre tiene " . substr_count($nombre, "a") . " caracteres A. <br/>";
    echo "Tu nombre en mayúsculas es: " . strtoupper($nombre) . "<br/>";
    echo "Sus apellidos en minúsculas son: " . strtoupper($apellidos) . "<br/>";
    echo "Su nombre y apellido en mayúsculas: " . strtoupper($nombre) . " " . strtoupper($apellidos) . "<br/>";
    echo "Tu nombre escrito al revés es: " . strrev($nombre) . "<br/>";
}

?>