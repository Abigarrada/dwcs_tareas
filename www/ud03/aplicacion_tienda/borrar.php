<?php

$servername = "db";
$username = "root";
$password = "test";
try {
    // Conexión a base de datos
    $conPDO = new PDO("mysql:host=$servername;dbname=TIENDA", $username, $password);
    // forzar excepciones
    $conPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // consulta sql para eliminar
    $sql = "DELETE FROM usuarios WHERE id=";

    $conPDO->exec($sql);
    echo "<p class=\"text-danger\">El registro con id -- se ha eliminado correctamente</p>";
} catch (PDOException $e) {
    echo $sql . "Error: <br>" . $e->getMessage();
}
$conn = null;
echo "</table>";
