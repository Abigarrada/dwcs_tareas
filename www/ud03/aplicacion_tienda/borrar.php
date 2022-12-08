<?php
include "funciones.php";
$conexion = conecta_bbdd();
borra_usuario($_GET['id'], $conexion);
$conexion->close();
echo '<br><a class="text-info" href="./listar_usuarios.php">Volver a la lista de usuarios</a>';
