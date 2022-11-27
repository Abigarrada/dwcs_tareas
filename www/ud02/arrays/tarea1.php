<?php

// 1. Almacena en un array los 10 primeros números pares. 
//Imprímelos cada uno en una línea.
$numeros = [2, 4, 6, 8, 10, 12, 14, 16, 18, 20];
$largo = count($numeros);

for ($i = 0; $i < $largo; $i++) {
    echo $numeros[$i] . "<br/>";
}

// 2. Imprime los valores del array asociativo siguiente usando un foreach:

$v[1] = 90;
$v[10] = 200;
$v['hola'] = 43;
$v[9] = 'e';


foreach ($v as $k => $v) {
    echo $v;
}

foreach ($v as $key => $value) {
    echo "Clave: " . $key . " Valor: " . $value . "<br/>";
}
