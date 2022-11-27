<?php

//Haz una página que ejecute la función phpinfo() y que muestre las principales variables de servidor mencionadas en teoría.

phpinfo();

echo "Dirección IP: " . $_SERVER["SERVER_ADDR"] . "<br/>";
echo "Nombre: " . $_SERVER["SERVER_NAME"] . "<br/>";
echo "Protocolo: " . $_SERVER["SERVER_PROTOCOL"] . "<br/>";
echo "Método de petición: " . $_SERVER["REQUEST_METHOD"] . "<br/>";
echo "Fecha y hora de petición: " . $_SERVER["REQUEST_TIME"] . "<br/>";
